<footer class="uix-footer__container uix-spacing--no-top">
    <div class="uix-footer .uix-spacing--no">
        <div class="container .uix-spacing--no">
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 uix-t-r uix-t-c--md">
                    <div class="uix-footer__menu">
                        <ul>
                            <li><a href="http://book.canliang.wang" target="_blank">知识库</a></li>
                            <li><a href="http://read.canliang.wang" target="_blank">PC端阅读</a></li>
                            <li><a href="http://nav.canliang.wang" target="_blank">导航</a></li>
                            <li><a href="http://wjob.canliang.wang" target="_blank">支持</a></li>
                            @if (isset($classical))
                            <li><a href="javascript:zh_tran('s');$('.showelem').toggle();" id="zh_click_s"><span>简体</span></a></li>
                            <li><a href="javascript:zh_tran('t');$('.showelem').toggle();" id="zh_click_t"><span>繁體</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 uix-t-l uix-t-c--md">
                    <!--<a href="{{$currentDomain}}">acanstudio</a> All Rights Reserved. <br />-->
                    <a href="http://beian.miit.gov.cn/" target="_blank">{{$currentIcp}}</a>
                </div>
            </div>
        </div><!-- .container  end -->
    </div>
</footer>
