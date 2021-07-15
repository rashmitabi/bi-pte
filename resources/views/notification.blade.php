    <span class="heading"> Notifications </span>
    <div class="notifications-main-wrap">
        <ul>
            @if(!empty($notifications))
                @foreach($notifications as $newNotify)
                    <li><a href="{{ route('superadmin-view-notifications', $newNotify->id) }}">{{ $newNotify->title }}<span>{{ $newNotify->created_at->diffForHumans() }}</span></a></li>
                @endforeach
            @endif
            @if (isset($role_id))
                @if($role_id == 1)
                <a href="{{ route('superadmin-notifications') }}"><li> View All<span></span></li></a>
                @elseif($role_id == 2)
                <a href="{{ route('branchadmin-notifications') }}"><li> View All<span></span></li></a>
                @endif
            @endif
        </ul>
    </div>
