<div class="row">
		
    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

            <!-- Profile Info -->
            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                <a href="javacript(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('admin/assets/images/thumb-1@2x.png') }}" alt="" class="img-circle" width="44" />
                    {{ Auth::user()->name }}
                </a>
            </li>

        </ul>

    </div>


    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">
            <li>
                <form action="{{ route('logout') }}" id="form-logout" method="POST" class="form-inline d-none">
                    @csrf
                </form>
                <a href="javascript:;" onclick="jQuery('#form-logout').submit();">
                    Log Out <i class="entypo-logout right"></i>
                </a>
            </li>
        </ul>

    </div>

</div>