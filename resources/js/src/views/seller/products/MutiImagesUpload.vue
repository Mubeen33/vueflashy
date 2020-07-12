
<template>
    <vx-card title="Multiple" code-toggler>
        <h3 class="mt-4 mb-1">Upload Product Images</h3>
        <small>Products  with good and clear images sold faster .. ! </small>

        <div class="mt-4">
            <vs-upload multiple text="Product Images" action="https://jsonplaceholder.typicode.com/posts/" @on-success="successUpload" />
        </div>

        <template slot="codeContainer">
            &lt;template&gt;
            &lt;vs-upload multiple text=&quot;Upload Multiple&quot; action=&quot;https://jsonplaceholder.typicode.com/posts/&quot; @on-success=&quot;successUpload&quot; /&gt;
            &lt;/template&gt;

            &lt;script&gt;
            export default {
            methods:{
            successUpload(){
            this.$vs.notify({color:'success',title:'Upload Success',text:'Lorem ipsum dolor sit amet, consectetur'})
            }
            }
            }
            &lt;/script&gt;
        </template>

    </vx-card>
</template>

<script>
    export default {
        methods: {
            successUpload () {
                this.$vs.notify({ color: 'success', title: 'Upload Success', text: 'Lorem ipsum dolor sit amet, consectetur' })
            }
        }
    }
</script>
