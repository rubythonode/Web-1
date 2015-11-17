<div class="container ">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand " href="#">{{ trans('user.account_panel') }} :: <small>{{ $title }}</small></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php $menu=Menu::dashboard();?>
        @foreach ($menu as $item)
          @if(is_array($item['route']))

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{$item['text']}} <span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu">
              @foreach ($item['route'] as $item2)
                <li class="{{isset($item2['class'])?$item2['class']:''}} {{ Menu::active($item2['route']) }}" >
                  <a href='{{$item2['route']}}'>@if(isset($item2['icon']))<span class="{{$item2['icon']}}"></span>@endif {{$item2['text']}} @if(isset($item2['cont'])&&$item2['cont']>0)<span class="badge pull-right">{{$item2['cont']}}</span>@endif </a>
                </li>
                @if(isset($item2['divider']))<li class="divider"></li>@endif
              @endforeach
              </ul>
            </li>
          
          @else
            <li class="{{isset($item['class'])?$item['class']:''}} {{ Menu::active($item['route']) }}" >
              <a href='{{$item['route']}}'>@if(isset($item['icon']))<span class="{{$item['icon']}}"></span>@endif {{$item['text']}} @if(isset($item['cont'])&&$item['cont']>0)<span class="badge pull-right">{{$item['cont']}}</span>@endif </a>
            </li>
            @if(isset($item['divider']))<li class="divider"></li>@endif
          @endif
      @endforeach    

      </ul>
    </div>
  </div>
</nav>
</div>