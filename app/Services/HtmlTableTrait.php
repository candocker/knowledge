<?php

namespace ModuleKnowledge\Services;

trait HtmlTableTrait
{

    public function createTable($pointPath, $bigSort, $sort)
    {
        $path = module_path(app('current.module'), 'database/table-datas/' . $pointPath . '/' . $bigSort . '.php');
        if (!file_exists($path)) {
            echo "{$path} 文件不存在！";
            exit();
        }
        $datas = require($path);
        $tableStr = '<link href="http://asset.canliang.wang/metronic/media/css/custom-table.css?v=1" rel="stylesheet" type="text/css"/>' . "\n\n";
        if (!empty($sort)) {
            $data = $datas[$sort] ?? [];
            $data = $this->formatDatas($data);
            $tableStr .= $this->getTableStr($data);
        } else {
            foreach ($datas as $data) {
                $data = $this->formatDatas($data);
                $tableStr .= $this->getTableStr($data);
                $tableStr .= '<hr class="hr-gradient">';
            }
        }
        echo $tableStr;
        exit();
    }

    public function getTableStr($data)
    {
        $tableSort = 'common';
        $tableMethod = "_{$tableSort}Table";
        $tableStr = $this->$tableMethod();

        $titleMethod = "_{$tableSort}Title";
        $commonTitle = $this->$titleMethod($data['title'] ?? '', $data['desc'] ?? '');
        $footerMethod = "_{$tableSort}Footer";
        $footer = $this->$footerMethod($data['footer'] ?? '');
        $tableHeader = $this->getTableHeader($data['headerTitles'] ?? [], $data['widthTitles'] ?? []);
        $tableList = $this->getTableList($data['infos'] ?? [], $data['extStyles'] ?? []);
        $targets = ['{{COMMON_TITLE}}', '{{COMMON_TABLE_HEADER}}', '{{COMMON_TABLE_LIST}}', '{{COMMON_FOOTER}}'];
        $replaces = [$commonTitle, $tableHeader, $tableList, $footer];
        $str = str_replace($targets, $replaces, $tableStr);

        return $str;
    }

    public function _commonTable()
    {
        $tableLayout = '<div class="demo-container">'
            . '<div class="table-card">'
            . '{{COMMON_TITLE}}'
            . '<div class="responsive-table-wrapper">'
            . '<table class="data-table">'
            . '{{COMMON_TABLE_HEADER}}'
            . '{{COMMON_TABLE_LIST}}'
            . '</table>'
            . '</div>'
            . '{{COMMON_FOOTER}}'
            . '</div>'
            . '</div>';
        return $tableLayout;
    }

    public function _commonTitle($title, $desc)
    {
        if (empty($title) && empty($desc)) {
            return '';
        }
        $str = '<div class="table-header">';
        if (!empty($title)) {
            $str .= '<div class="table-title">' . $title . '</div>';
        }
        if (!empty($desc)) {
            $str .= '<div class="table-desc">' . $desc . '</div>';
        }
        $str .= '</div>';
        return $str;
    }

    public function _commonFooter($footer)
    {
        if (empty($footer)) {
            return '';
        }
        return '<div class="footnote">' . $footer . '</div>';
    }

    public function getTableHeader($headerTitles, $widthTitles)
    {
        if (empty($headerTitles)) {
            return '';
        }
        $str = '';
        foreach ((array) $widthTitles as $width) {
            $str .= "<col style=\"width: {$width}%;\" />";
        }
        $str .= '<thead><tr>';
        foreach ($headerTitles as $hTitle) {
            $str .= "<th>{$hTitle}</th>";
        }
        $str .= '</tr></thead>';
        return $str;
    }

    public function getTableList($infos, $extStyles)
    {
        if (empty($infos)) {
            return '';
        }
        $str = '<tbody>';
        $pointStyles = [
            'center' => 'text-align: center; vertical-align: middle;',
            'left' => 'text-align: left; vertical-align: middle;',
        ];
        foreach ($infos as $topKey => $info) {
            $str .= '<tr>';
            $fExts = [];
            if (isset($info['fExts'])) {
                $fExts = $info['fExts'];
                unset($info['fExts']);
            }
            $pointStyle = '';
            if (isset($info['tdPosition'])) {
                $pointStyle = ' style="' . $pointStyles[$info['tdPosition']] . '"';
                unset($info['tdPosition']);
            }
            $cIndex = 0;
            foreach ($info as $key => $value) {
                $extStyle = $extStyles[$key] ?? '';
                $extStyle = $extStyle ? " style=\"{$extStyle}\"" : '';
                $colSpan = $fExts[$cIndex . '_col'] ?? false;
                $colStr = $colSpan ? " colspan=\"{$colSpan}\"" : '';
                $rowSpan = $fExts[$cIndex . '_row'] ?? false;
                $rowStr = $rowSpan ? " rowspan=\"{$rowSpan}\"" : '';
                $tdPosition = $fExts[$cIndex . '_tdPosition'] ?? false;
                $pointStyle = $tdPosition ? ' style="' . $pointStyles[$tdPosition] . '"' : $pointStyle;
                $str .= "<td{$extStyle}{$rowStr}{$colStr}{$pointStyle}>{$value}</td>";
                $cIndex++;
            }
            $str .= '</tr>';
        }
        $str .= '</tbody>';
        return $str;
    }

    public function formatDatas($data)
    {
        if (!isset($data['haveKey'])) {
            return $data;
        }
        $headerKeys = array_keys($data['headerTitles']);
        foreach ($data['infos'] as $key => $source) {
            $newInfo = [];
            foreach ($headerKeys as $hKey) {
                if (!isset($source[$hKey]) && $hKey != 'brief') {
                    continue;
                }
                $value = $source[$hKey] ?? '';
                if ($hKey == 'name' && isset($source['url']) && !empty($source['url'])) {
                    $value = "<a href='{$source['url']}'>{$value}</a>";
                }
                if ($hKey == 'brief' && isset($source['briefElems']) && !empty($source['briefElems'])) {
                    $bElems = [];
                    foreach ($source['briefElems'] as $bElem) {
                        $baseValue = $bElem['name'] ?? ($bElem['url'] ?? '-');
                        if (isset($bElem['url']) && !empty($bElem['url'])) {
                            $baseValue = "<a href='{$bElem['url']}'>{$baseValue}</a>";
                        }
                        if (isset($bElem['weburl'])) {
                            $webname = $bElem['webname'] ?? '官网';
                            $baseValue .= "<a href='{$bElem['weburl']}'>({$webname})</a>";
                        }
                        $bElems[] = $baseValue;
                    }

                    $value .= implode('、', $bElems);
                }
                $newInfo[$hKey] = $value;
            }
            foreach (['fExts', 'tdPosition'] as $pointKey) {
                if (isset($source[$pointKey])) {
                    $newInfo[$pointKey] = $source[$pointKey];
                }
            }
            $data['infos'][$key] = $newInfo;
        }
        return $data;
    }
}
