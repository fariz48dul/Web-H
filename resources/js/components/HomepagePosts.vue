<template>
<div class="mb-4">

    <div class="slider">
        <!-- slider -->
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/dist/img/photo1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/dist/img/photo2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/dist/img/photo3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>

    </div>

    <!-- container-fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="row">
                    <div class="col-4" v-for="post in posts">
                        <div class="card rounded-0 p-0 shadow-sm">
                            <img :src="'/images/' + post.image" class="card-img-top rounded-0" alt="" />
                            <div class="card-body">
                                <h6 class="card-title"> {{post.title }}</h6>
                                <p class="card-text text-truncate">
                                    {{post.body}}....
                                </p>
                                <p class="card-text">
                                    <a href="#" target="_blank" class="btn btn-light btn-sm float-left"><i class="fa fa-share"></i></a>
                                </p>

                                <router-link :to="{ name: 'readpost', params: { slug : post.slug } }">
                                    <button type="button" class="btn btn-secondary btn-sm float-right">
                                        Read More..
                                    </button>
                                </router-link>

                            </div>
                        </div>
                    </div>
                </div><!-- ./col-10 ./row -->

                <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="getPosts()"></pagination>

            </div><!-- ./col-10 -->

            <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success">Success item</li>
                    <li class="list-group-item list-group-item-secondary">Secondary item</li>
                    <li class="list-group-item list-group-item-info">Info item</li>
                    <li class="list-group-item list-group-item-warning">Warning item</li>
                    <li class="list-group-item list-group-item-danger">Danger item</li>
                    <li class="list-group-item list-group-item-primary">Primary item</li>
                    <li class="list-group-item list-group-item-dark">Dark item</li>
                    <li class="list-group-item list-group-item-light">Light item</li>
                    <li class="list-group-item list-group-item-success">Success item</li>
                    <li class="list-group-item list-group-item-secondary">Secondary item</li>
                    <li class="list-group-item list-group-item-info">Info item</li>
                    <li class="list-group-item list-group-item-warning">Warning item</li>
                    <li class="list-group-item list-group-item-danger">Danger item</li>
                    <li class="list-group-item list-group-item-primary">Primary item</li>
                    <li class="list-group-item list-group-item-dark">Dark item</li>
                    <li class="list-group-item list-group-item-light">Light item</li>
                </ul>
            </div><!-- ./col-2 -->

        </div><!-- ./row -->

    </div> <!-- ./container-fluid -->

</div>
</template>

<script>
import pagination from './Pagination.vue';

export default {
    metaInfo: {
        title: 'Homepage - HIMTI-UMT',
    },
    components: {
        pagination
    },

    data() {
        return {
            posts: {},
            pagination: {
                'current_page': 1
            },
        };
    },
    created: function() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get('/api/getHomepagePosts?page=' + this.pagination.current_page)
                // axios.get('/api/getHomepagePosts')
                .then(response => {
                    console.log(response.data)
                    // this.posts = response.data;
                    this.posts = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        },
    }
};
</script>

<style scoped>
.card img {
    max-width: 480px;
    max-height: 264px;
}
</style>
