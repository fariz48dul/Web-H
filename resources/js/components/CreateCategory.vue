<!-- CreateCategory.vue -->
<template>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">Create New Category</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

            <div class="alert alert-success" v-if="successful" role="alert">
                <h4>Save Successful!</h4>
                <small>Kategori baru berhasil dibuat!</small>
            </div>

            <form>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="name" ref="name" placeholder="Name">
                    <div class="badge badge-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                    </div>
                </div>

                <button type="submit" @click.prevent="createCategory" class="btn btn-primary">
                    Submit
                </button>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
</template>

<script>
export default {
    metaInfo: {
        title: 'Create Category - HIMTI-UMT',
    },
    props: {
        userId: {
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
    methods: {
        createCategory() {
            const formData = new FormData();
            formData.append('name', this.$refs.name.value);
            formData.append('user_id', this.userId);

            axios.post('/api/categories', formData)
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
            this.$refs.name.value = "";
        },
    }


}
</script>

<style lang="css" scoped>
</style>
