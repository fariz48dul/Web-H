<!-- EditPost.vue -->
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
                <h4>Updated!</h4>
                <small>Post berhasil diupdate</small>
            </div>

            <form>
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" v-model="title" id="title" ref="title" placeholder="Title">
                    <div class="badge badge-danger" v-if="errors.title">
                        {{ errors.title[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputCategory">Category</label>
                    <select class="form-control" v-model="old_category" ref="category_id" id="category">
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
                    <textarea class="form-control" v-model="body" id="body" ref="body" rows="5" placeholder="Body"></textarea>
                    <div class="badge badge-danger" v-if="errors.body">
                        {{ errors.body[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputImage">Image</label>

                    <div class="form-group">
                        <div class="col-4">
                            <img :src="'/images/' + image" style="width: 100%">
                        </div>
                    </div>

                    <div class="custom-file">
                        <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <div class="badge badge-danger" v-if="errors.body">
                            {{ errors.image[0] }}
                        </div>
                    </div>
                </div>

                <button type="submit" @click.prevent="updatePost" class="btn btn-primary">Submit</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
</template>

<script>
export default {
    metaInfo: {
        title: 'Edit Post - HIMTI-UMT',
    },
    props: {
        postId: {
            type: Number,
            required: true
        }
    },
    data: function() {
        return {
            successful: false,
            errors: [],
            categories: [],
            title: '',
            body: '',
            image: '',
            old_category: ''

        }
    },
    created: function() {
        this.getCategories();
        this.getPosts();
    },
    methods: {
        updatePost() {
            const formData = new FormData();
            formData.append('title', this.$refs.title.value);
            formData.append('body', this.$refs.body.value);
            formData.append('image', this.$refs.image.files[0]);
            formData.append('category_id', this.$refs.category_id.value);
            formData.append('_method', 'PUT');

            axios.post('/api/posts/' + this.postId, formData)
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
        getPosts() {
            axios.get("/api/posts/" + this.postId + '/edit')
                .then(response => {
                    console.log(response.data);
                    this.title = response.data.title;
                    this.body = response.data.body;
                    this.image = response.data.image;
                    this.old_category = response.data.category_id;
                })
        },
        getCategories() {
            axios.get("/api/getCategories")
                .then(response => {
                    console.log(response.data);
                    this.categories = response.data;
                })
        }
    }

}
</script>
