<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <?php $urlmenu ="#page-top"?>
      @if(!empty($islist))
        <?php $urlmenu =action('ContactController@index') ?>
      @endif
      <a class="navbar-brand js-scroll-trigger" href="{{$urlmenu}}">Developer Test</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      @if(empty($islist))
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @foreach($info as $key=>$info)
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#{{$key}}">{{$info}}</a>
            </li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </nav>