<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->gravatar('80') }}" alt="{{ $user->name }}" class="img-circle img-thumbnail"/>
</a>
<h1>{{ $user->name }}</h1>
<h5 class="text-center">
  <span class="label label-{{ $user->verified == 0 ? 'default' : 'success' }}">
      {{ $user->verified == 0 ? '未认证' : '已认证 - '.$user->identity }}
  </span>
</h5>
<ul class="list-inline">
  @if ($user->real_name)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->real_name }}">
      <i class="fa fa-user"></i> {{ $user->real_name }}
    </li>
  @endif

  @if ($user->department)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->getDepartmentName($user->department) }}">
      <i class="fa fa-group"></i> {{ $user->getDepartmentName($user->department) }}
    </li>
  @endif

  @if ($user->academy)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->getAcademyName($user->academy) }}">
      <i class="fa fa-bank"></i>
    </li>
  @endif

  @if ($user->major)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->major }}">
      <i class="fa fa-graduation-cap"></i>
    </li>
  @endif

  @if ($user->email)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->email }}">
      <a href="mailto:{{ $user->email }}">
        <i class="fa fa-envelope"></i>
      </a>
    </li>
  @endif

  @if($user->weibo_link)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->weibo_name }}">
      <a href="{{ $user->weibo_link }}" target="_blank">
        <i class="fa fa-weibo"></i>
      </a>
    </li>
  @endif

  @if ($user->personal_website)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->personal_website }}">
      <a href="{{ $user->personal_website }}" rel="nofollow" target="_blank" class="url">
        <i class="fa fa-globe"></i>
      </a>
    </li>
  @endif

  @if ($user->city)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->city }}">
      <i class="fa fa-map-marker"></i>
    </li>
  @endif

  @if($user->tel)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->tel }}">
      <i class="fa fa-phone"></i>
    </li>
  @endif

  @if($user->qq)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->qq }}">
      <i class="fa fa-qq"></i>
    </li>
  @endif

  @if($user->wechat)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->wechat }}">
      <i class="fa fa-wechat"></i>
    </li>
  @endif

  @if($user->birthday)
    <li data-toggle="tooltip" data-placement="bottom" title="{{ $user->birthday }}">
      <i class="fa fa-birthday-cake"></i>
    </li>
  @endif

</ul>
