<template>
<div v-if="variations.length > 0" class="col-md-12 p-0">
    <div class="card">
        <div class="card-body border pt-2 pb-2">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title </th>
                    <th>Variation Type</th>
                    <th> </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="vary in variations">
                    <td>{{vary.id}}</td>
                    <td>{{vary.label}}</td>
                    <td>{{vary.variation_type}}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="feather icon-plus"></i>  Add option
                        </button>
                        <button class="btn btn-secondary btn-sm" type="button">
                            <i class="feather icon-list"></i>   Option List
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm" type="button">
                            <i class="feather icon-edit"></i>   Edit
                        </button>
                        <button class="btn btn-dark btn-sm" type="button">
                            <i class="feather icon-trash"></i>  Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</template>
<script>
    export default {
        props :['variations']
    }
</script>
