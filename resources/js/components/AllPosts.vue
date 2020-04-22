<!-- AllPosts.vue -->
<template>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">All Post</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

            <div class="alert alert-danger" v-if="successful" role="alert">
                <h4>Deleted!</h4>
                <small>Pos berhasil dihapus!</small>
            </div>

            <table class="table table-dark table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody v-for="post in posts">
                    <tr>
                        <td>{{ post.title }}</td>
                        <td>
                            <img :src="'/images/' + post.image" class="figure rounded d-block" />
                        </td>
                        <td>{{ post.category.name }}</td>
                        <td>
                            <router-link :to="{ name: 'editpost', params: { postId : post.id } }">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </router-link>
                            <button type="button" class="btn btn-danger" v-on:click="deletePost(post.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="getPosts()"></pagination>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
</template>

<script>
import pagination from './Pagination.vue';

export default {
    metaInfo: {
        title: 'All Post - HIMTI-UMT',
    },
    components: {
        pagination
    },

    data: function() {
        return {
            posts: [],
            successful: false,
            pagination: {
                'current_page': 1
            },

        }
    },
    created: function() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get('/api/posts?page=' + this.pagination.current_page)
                // axios.get('/api/posts')
                .then(response => {
                    // console.log(response.data.data);
                    this.posts = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(error => {
                    // console.log(error.response.data.data);
                });
        },
        deletePost(id) {
            axios.delete("/api/posts/" + id)
                .then(response => {
                    this.getPosts();
                    this.successful = true;
                    console.log('deleted!');
                });
        }
    }
};
</script>

<style scoped>
img {
    max-height: 220px;
    max-width: 400px;
}
</style>
