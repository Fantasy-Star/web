@extends('layouts.default')
@section('title', '英灵殿')

@section('content')
    <div class="panel panel-default">
        <div class="page-header text-center">
            <h2>英灵殿 <small>Fantasy Star</small></h2>
        </div>
        <p class="text-center">
            Fantasy Star 英灵殿，记载对本社团有突出贡献的成员。
        </p>
    </div>

    <?php $year_flag = 0; ?>
    <div class="valhalla">
        @foreach($heros as $index => $hero)
                @if($hero->year != $year_flag)
                    <?php $year_flag = $hero->year; ?>
            <div class="col-lg-12">
                    <div class="page-header text-center">
                        <h2><span class="label label-warning"> <?php echo $year_flag; ?> </span></h2>
                    </div>
            </div>
                @endif
            <div class="col-lg-6">
            <div class="panel panel-default" style="min-height: 140px;padding-bottom: 0px;">

                <div class="media-left text-center">
                    @if($hero->user_id)
                        <a href="{{ route('users.show', $hero->user_id) }}" {{ $hero->user_id ? 'style="underline:none;"':'' }}>
                            <img src="{{ $hero->getHeroInfo()->gravatar() }}}" alt="{{ $hero->name }}" class="img-thumbnail gravatar m-b-10"/>
                        </a>
                    @else
                        <img src="http://www.gravatar.com/avatar/" class="img-thumbnail gravatar m-b-10">
                    @endif

                    <a class="label label-primary" href="{{ $hero->user_id ? route('users.show', [$hero->user_id]) : 'javascript:;' }}"
                       title="{{ $hero->user_id ? $hero->name : '尚未关联账号' }}" data-toggle="tooltip" data-placement="bottom">
                        {{ $hero->name }}
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-heading m-b-10">
                        <span class="label label-success">
                            {{ $hero->year }}
                        </span> &nbsp;
                        <span class=" label label-info">
                            {{ $hero->position }}
                        </span> &nbsp;
                        @if($hero->title)
                        <span class=" label label-danger" data-toggle="tooltip" title="谥号">
                            {{ $hero->title }}
                        </span> &nbsp;
                        @endif
                        @if($hero->nickname)
                        <span class=" label label-warning" data-toggle="tooltip" title="昵称">
                            {{ $hero->nickname }}
                        </span> &nbsp;
                        @endif
                        @if($hero->user_id)
                        <span>
                            <small class="text-muted">{{ $hero->getHeroInfo()->introduction }}</small>
                        </span>
                        @endif
                    </div>

                    @if($hero->description)
                        <div class="well" style="margin-bottom: 0px;padding: 10px;">
                            <?php echo $hero->description; ?>
                        </div>
                    @endif

                    @if($hero->user_id)
                        <ul class="list-inline">
                            @if ($hero->getHeroInfo()->email)
                                <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->email }}">
                                    <a href="mailto:{{ $hero->getHeroInfo()->email }}">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            @endif

                            @if($hero->getHeroInfo()->weibo_link)
                            <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->weibo_name }}">
                                <a href="{{ $hero->getHeroInfo()->weibo_link }}" target="_blank">
                                    <i class="fa fa-weibo"></i>
                                </a>
                            </li>
                            @endif

                            @if ($hero->getHeroInfo()->personal_website)
                                <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->personal_website }}">
                                    <a href="{{ $hero->getHeroInfo()->personal_website }}" rel="nofollow" target="_blank" class="url">
                                        <i class="fa fa-globe"></i>
                                    </a>
                                </li>
                            @endif

                            @if($hero->getHeroInfo()->qq)
                                <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->qq }}">
                                    <i class="fa fa-qq"></i>
                                </li>
                            @endif

                            @if($hero->getHeroInfo()->wechat)
                                <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->wechat }}">
                                    <i class="fa fa-wechat"></i>
                                </li>
                            @endif

                            @if ($hero->getHeroInfo()->city)
                                <li data-toggle="tooltip" data-placement="bottom" title="{{ $hero->getHeroInfo()->city }}">
                                    <i class="fa fa-map-marker"></i>
                                </li>
                            @endif

                        </ul>
                    @endif

                </div>

            </div>
            </div>
        @endforeach
    </div>

    @include('plugins.changyan', ['sid' => 'valhalla'])

@stop
