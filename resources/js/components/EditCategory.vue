<!-- EditCategory.vue -->
<template>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

            <div class="alert alert-success" v-if="successful" role="alert">
                <h4>Updated!</h4>
                <small>Kategori berhasil diupdate</small>
            </div>

            <form>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="name" ref="name" placeholder="Name">
                    <div class="badge badge-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                    </div>
                </div>

                <button type="submit" @click.prevent="updateCategory" class="btn btn-primary">
                    Submit
                </button>
                <router-link :to="{ name: 'allcategories'}">
                    <button type="submit" class="btn btn-danger">Back</button>
                </router-link>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
</template>

<script>
export default {
    metaInfo: {
        title: 'Edit Category - HIMTI-UMT',
    },
    props: {
        categoryId: {
            type: Number,
            required: true
        }
    },
    data: function() {
        return {
            successful: false,
            errors: [],
        }
    },
    created: function() {
        this.getCategory();
    },
    methods: {
        updateCategory() {
            let name = this.$refs.name.value;
            axios.put('/api/categories/' + this.categoryId, {
                    name
                })
                .then(response => {
                    console.log(response.data);
                    this.successful = true;
                    this.errors = false;
                })
                .catch(error => {
                    if ((error.response.status = 422)) {
                        console.log(error.response.data);
                        this.errors = error.response.data.errors;
                        this.successful = false;
                    }
                });
        },
        getCategory() {
            axios.get("/api/categories/" + this.categoryId + "/edit")
                .then(response => {
                    console.log(response.data);
                    this.$refs.name.value = response.data.name;
                })
        }
    }

}
</script>
