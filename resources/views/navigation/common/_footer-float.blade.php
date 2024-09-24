<style>
@media (max-width: 1350px)
.subnav {
    display: none;
}
.subnav{position:fixed;top:295px;right:0;overflow:hidden;border-radius:3px 0 0 3px;text-align:center;font-size:15px}.subnav li a{display:block;width:95px;height:32px;border-bottom:1px solid #ddd;background-color:#f5f5f5;color:#555;text-decoration:none;line-height:32px;transition:.3s}.subnav li a.last-child{border-bottom:none}.subnav li a:hover{background-color:#eee;color:#f80}
</style>
<ul class="subnav list-group" id="navs">
    @foreach ($datas['sorts'] as $pIndex => $pData)
    <li>
        <a href="#{{$pData['code']}}" class="anchor-scroll"><i class="fa {{$pData['icon']}}"></i> {{$pData['name']}}</a>
    </li>
    @endforeach 
</ul>
<div class="tui">
    <a href="https://wj.qq.com/s2/3881997/233a/" target="_blank" title="网站推荐/提交、吐槽反馈">
        <img src="{{$commonAssetUrl}}/nav/img/96fd5-1515.png">
    </a>
</div>
