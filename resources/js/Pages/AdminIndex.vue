<template>
    <div>
        <!-- Side Bar Panel  -->
        <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i>Admin Panel</a></div>
        <div class="sl-sideleft">
            <label class="sidebar-label">Hotel Reservation Dashboard</label>
            <div class="sl-sideleft-menu">

                <Link :href="route('admin.hotel.dashboard')" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div>
                </Link>



                <Link  :href="route('admin.amenities')" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                        <span class="menu-item-label">Amenities</span>
                    </div>
                </Link>

                <Link  :href="route('admin.room')" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                        <span class="menu-item-label">Room</span>
                    </div>
                </Link>

                <Link  :href="route('admin.booked.customer.lst')" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                        <span class="menu-item-label">Booking Info</span>
                    </div>
                </Link>

            </div>
            <br>
        </div>

        <!-- Admin After Login Info  -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div>
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name">Super<span class="hidden-md-down"> Admin</span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                                <li>
                                    <Link :href="route('logout')" method="post"><i class="icon ion-power"></i> Sign Out</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    name: "AdminIndex",
    components:{
        Link
    }
}
</script>

<style scoped>

</style>
