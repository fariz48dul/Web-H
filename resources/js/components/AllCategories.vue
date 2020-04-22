<!-- AllCategories.vue -->
<template>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">All Category</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

            <div class="alert alert-danger" v-if="successful" role="alert">
                <h4>Deleted!</h4>
                <small>Kategori berhasil dihapus!</small>
            </div>

            <table class="table table-dark table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody v-for="category in categories">
                    <tr>
                        <td>{{ category.id }}</td>
                        <td>{{ category.name }}</td>
                        <td>
                            <router-link :to="{ name: 'editcategory', params: { categoryId: category.id } }">
                                <button type="button" class="btn btn-primary">
                                    Edit
                                </button>
                            </router-link>

                            <button type="button" @click="deleteCategory(category.id)" class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="getCategories()"></pagination>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
</template>

<script>
import pagination from './Pagination.vue';

export default {
    metaInfo: {
        title: 'All Category - HIMTI-UMT',
    },
    components: {
        pagination
    },

    data: function() {
        return {
            categories: [],
            successful: false,
            pagination: {
                'current_page': 1
            },
        }
    },
    created: function() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/categories?page=' + this.pagination.current_page)
                // axios.get('/api/categories')
                .then(response => {
                    // console.log(response.data.data.data);
                    this.categories = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(error => {
                    //
                });
        },
        deleteCategory(id) {
            axios.delete("/api/categories/" + id)
                .then(response => {
                    console.log('deleted!');
                    this.getCategories();
                    this.successful = true;
                });
        }
    }
};
</script>
