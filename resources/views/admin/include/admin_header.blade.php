<header class="header">
    <div class="logo-container">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="{{ asset('backend/img/webmarka.png') }}" width="110" height="35" alt="Porto Admin" />
        </a>
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="header-right">

        <span class="separator"></span>

        <ul class="notifications">
            <li>
                @php
                    $notificationCount = Auth::user()->unreadNotifications()->count();
                @endphp
                <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown" id="notification-count">
                    <i class="bx bx-bell"></i>
                    <span class="badge">{{ $notificationCount }}</span>
                </a>

                <div class="dropdown-menu notification-menu">
                    <div class="notification-title">
                        <span class="float-end badge badge-default">{{ $notificationCount }}</span>
                        Bildirim
                    </div>

                    <div class="content">
                        <ul>
                            @php
                                $user = Auth::user();
                            @endphp

                            @forelse ($user->notifications as $notifications)

                            <li>
                                <a href="javascript:;" onclick="markNotificationRead('{{ $notifications->id }}')" class="clearfix">
                                    <div class="image">
                                        <i class="fa-solid fa-cart-plus bg-warning text-light"></i>
                                    </div>
                                    <span class="title">Yeni Sipariş!</span>
                                    <span class="message">{{ $notifications->data['message'] }}</span>
                                    <span class="message">{{ Carbon\Carbon::parse($notifications->created_at)->diffForHumans() }}</span>
                                </a>
                            </li>

                            @empty

                            @endforelse

                        </ul>

                        <hr />
                    </div>
                </div>
            </li>
        </ul>

        <span class="separator"></span>

        @php
            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);
        @endphp

        <div id="userbox" class="userbox">
            <a href="#" data-bs-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/' . $profileData->photo) : url('upload/profile.png') }}"
                    data-lock-picture="{{ (!empty($profileData->photo)) ? url('upload/admin_images/' . $profileData->photo) : url('upload/profile.png') }}"
                    alt="Joseph Doe" class="rounded-circle"/>
                </figure>
                <div class="profile-info" data-lock-name="{{ $profileData->name }}" data-lock-email="{{ $profileData->email }}">
                    <span class="name">{{ $profileData->name }}</span>
                    <span class="email">{{ $profileData->email }}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route ('admin.profile') }}"><i class="bx bx-user-circle"></i>Profil</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route ('admin.logout') }}"><i class="bx bx-power-off"></i> Çıkış</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script>
    function markNotificationRead(notificationId){

        fetch('/mark-notification-as-read/'+notificationId,{
            method: 'POST',
            headers: {
                'Content-Type' : 'application/josn',
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('notification-count').textContent = data.count;
        })
        .catch(error => {
            console.log('Error',error)
        });
    }
</script>
