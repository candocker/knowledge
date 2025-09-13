<style>
    /* 重置样式 */
    /* 友情链接区域样式 */

    .link-list {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
    }

    .link-list li {
        margin-right: 15px;
        margin-bottom: 10px;
    }

    .link-list a {
        color: #adadad;
        text-decoration: none;
        transition: color 0.3s;
    }

    .link-list a:hover {
        color: #1890ff;
        text-decoration: underline;
    }

    /* 响应式设计 */
    @media (max-width: 768px) {
        .link-list {
            justify-content: center;
        }

        .footer-links h3 {
            text-align: center;
        }
    }
</style>
<div class="footer">
  <div class="container">
    <ul class="link-list">
      <li><a href="/wiki-muwiki-humanevolution.html">人类演变</a></li>
      <li><a href="/wiki-muwiki-ouzhoujiazu.html">欧洲血统</a></li>
      <li><a href="/wiki-muwiki-ghybwl.html">古汉语备忘录<a></li>
    </ul>
    <div class="footer-innerbak" style="display: flex; justify-content: center; align-items: center;">
      2024 &copy; acanstudio. 京ICP备13015487号
    </div>
    <div class="footer-tools">
      <span class="go-top">
      <i class="icon-angle-up"></i>
      </span>
    </div>
  </div>
</div>
