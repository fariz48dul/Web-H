<!-- Menuadmin.vue -->
<template>
<div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        <router-link :to="{ name: 'dashboard'}">
                            Dashboard
                        </router-link>
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a class="nav-link">
                    <i class="nav-icon fa fa-pencil-square-o"></i>
                    <p>
                        Post
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'allposts', params: {userId}  }">
                                <i class=" nav-icon far fa-circle"></i>
                                All Post
                            </router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'createpost', params: {userId}  }">
                                <i class=" nav-icon far fa-circle"></i>
                                New Post
                            </router-link>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a class="nav-link">
                    <i class="nav-icon fa fa-pencil-square-o"></i>
                    <p>
                        Category
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'allcategories' }">
                                <i class=" nav-icon far fa-circle"></i>
                                All Category
                            </router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'createcategory', params: {userId}  }">
                                <i class=" nav-icon far fa-circle"></i>
                                New Category
                            </router-link>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Setting
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'about' }">
                                <i class=" nav-icon far fa-circle"></i>
                                About
                            </router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <router-link :to="{ name: 'slider' }">
                                <i class=" nav-icon far fa-circle"></i>
                                Slider
                            </router-link>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.nav-sidebar-menu -->

</div>
</template>

<script>
   export default{
    props:{
      userId:{}
    }
   }
 </script>
