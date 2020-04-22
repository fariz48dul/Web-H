<!-- CreatePost.vue -->
<template>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">Create New Post</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

            <div class="alert alert-success" v-if="successful" role="alert">
                <h4>Saved Successfully!</h4>
                <small>Post baru berhasil dibuat dan dipublikasi</small>
            </div>

            <form>
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" id="title" ref="title" placeholder="Title">
                    <div class="badge badge-danger" v-if="errors.title">
                        {{ errors.title[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputCategory">Category</label>
                    <select class="form-control" ref="category_id" id="category">
                        <option value=""> Select Category </option>
                        <option v-for="category in categories" v-bind:value="category.id">
                            {{category.name}}
                        </option>
                    </select>
                    <div class="badge badge-danger" v-if="errors.category_id">
                        {{ errors.category_id[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputBody">Body</label>
                    <textarea class="form-control" id="body" ref="body" rows="5" placeholder="Body"></textarea>
                    <div class="badge badge-danger" v-if="errors.body">
                        {{ errors.body[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputImage">Image</label>
                    <div class="custom-file">
                        <input type="file" ref="image" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <div class="badge badge-danger" v-if="errors.body">
                            {{ errors.image[0] }}
                        </div>
                    </div>
                </div>

                <button type="submit" @click.prevent="create" class="btn btn-primary">Submit</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
</template>

<script>
export default {
    metaInfo: {
        title: 'Create Post - HIMTI-UMT',
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
            categories: [],
        }
    },
    created: function() {
        this.getCategories();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("user_id", this.userId);
            formData.append("title", this.$refs.title.value);
            formData.append("body", this.$refs.body.value);
            formData.append("category_id", this.$refs.category_id.value);
            formData.append("image", this.$refs.image.files[0]);

            axios.post('/api/posts', formData)
                .then(response => {
                    console.log(response.data);
                    this.successful = true
                })
                .catch(error => {
                    if ((error.response.status = 422)) {
                        console.log(error.response.data);
                        this.errors = error.response.data.errors;
                    }
                });

            this.$refs.title.value = "";
            this.$refs.body.value = "";
            this.$refs.category_id.value = "";
            this.$refs.image.value = "";
        },
        getCategories() {
            axios.get("/api/getCategories")
                .then(response => {
                    console.log(response.data);
                    this.categories = response.data;
                });
        }
    }
};
</script>
