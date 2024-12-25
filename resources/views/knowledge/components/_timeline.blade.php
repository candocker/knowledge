@php
$colors = ['yellow', 'blue', 'green', 'purple', 'grey'];
$icons = ['trophy', 'facetime-video', 'comments', 'rss', 'time', 'chart'];
@endphp
<div class="row-fluid">
  <div class="span12">
    <ul class="timeline">
      @foreach ($timelineDatas as $tData)
      <li class="timeline-{{$colors[rand(0,4)]}}">
        <div class="timeline-time">
          <span class="date">4/18/13</span>
          <span class="time">09:56</span>
        </div>
        <div class="timeline-icon"><i class="icon-{{$icons[rand(0, 5)}}"></i></div>
        <div class="timeline-body">
          <h2>ICT 2013 20th International Conference</h2>
          <div class="timeline-content">
            <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="">
            Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo. Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress.
            Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo.
          </div>
          <div class="timeline-footer">
            <a href="#" class="nav-link pull-right">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      @endforeach
      <li class="timeline-blue">
        <div class="timeline-body">
          <h2>Management Meeting</h2>
          <div class="timeline-content">
            <img class="timeline-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/1.jpg" alt="">
            Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi..
          </div>
          <div class="timeline-footer">
            <a href="#" class="nav-link">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      <li class="timeline-green">
        <div class="timeline-body">
          <h2>New Project Launch</h2>
          <div class="timeline-content">
            <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/3.jpg" alt="">
            Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean.
          </div>
          <div class="timeline-footer">
            <a href="#" class="nav-link">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      <li class="timeline-purple">
        <div class="timeline-time">
          <span class="date">4/15/13</span>
          <span class="time">13:15</span>
        </div>
        <div class="timeline-icon"><i class="icon-music"></i></div>
        <div class="timeline-body">
          <h2>Promotion Day</h2>
          <div class="timeline-content">
            <div class="scroller" data-height="175px" data-always-visible="1" data-rail-visible1="1">
              <p>
                <img class="timeline-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/4.jpg" alt="">
                Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi. coriander bitterleaf epazote radicchio shallot winter purslane collard.
              </p>
              <p>
                Coriander bitterleaf epazote radicchio shallot winter purslane collard.
                Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
              </p>
              <p>
                <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/6.jpg" alt="">
                Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi radicchio shallot winter purslane collard greens spring onion squash lentil.
              </p>
              <p>
                Coriander bitterleaf epazote radicchio shallot winter purslane collard.
                Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
              </p>
            </div>
          </div>
          <div class="timeline-footer">
            <a href="#" class="btn blue">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      <li class="timeline-red">
        <div class="timeline-body">
          <h2>Daily Feeds</h2>
          <div class="timeline-content">
            <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/5.jpg" alt="">
            Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo. Sierra leone bologi komatsuna celery peanut swiss chard silver beet squash dandelion maize chicory burdock tatsoi dulse radish wakame beetroot.
          </div>
          <div class="timeline-footer">
            <a href="#" class="btn green pull-right">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      <li class="timeline-grey">
        <div class="timeline-body">
          <h2>Staff Meeting</h2>
          <div class="timeline-content">
            Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
          </div>
          <div class="timeline-footer">
            <a href="#" class="nav-link pull-right">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
      <li class="timeline-blue">
        <div class="timeline-body">
          <h2>Demo Europe 2013</h2>
          <div class="timeline-content">
            <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="">
            Parsnip lotus root celery yarrow seakale tomato collard greens tigernut epazote ricebean melon tomatillo soybean chicory broccoli beet greens peanut salad. Lotus root burdock bell pepper chickweed shallot groundnut pea sprouts welsh onion wattle seed pea salsify turnip scallion peanut arugula bamboo shoot onion swiss chard.
          </div>
          <div class="timeline-footer">
            <a href="#" class="nav-link">
            Read more <i class="m-icon-swapright m-icon-white"></i>
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
