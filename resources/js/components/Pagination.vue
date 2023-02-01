<template>
  <div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- non serve l' href, devo dinamicizzare da Axios -->
            <li @click="$emit('on-page-change', pagination.currentPage - 1 )" v-if="pagination.currentPage > 1" class="page-item">
                <span role="button" class="page-link">Previous</span>
            </li>
            <li @click="$emit('on-page-change', n )" v-for="n in pagination.lastPage" :key="n" class="page-item">
                <span role="button" class="page-link">
                    {{ n }}
                </span>
            </li>
            <!-- <li class="page-item">
                <span role="button" class="page-link">2</span>
            </li>
            <li class="page-item">
                <span role="button" class="page-link">3</span>
            </li> -->
            <li @click="$emit('on-page-change', pagination.currentPage + 1 )" v-if="pagination.currentPage < pagination.lastPage" class="page-item">
                <span role="button" class="page-link">Next</span>
            </li>
        </ul>
    </nav>
  </div>
</template>

<script>
export default {
    name: 'Pagination',
    props: ['pagination']
    
}
</script>

<style>

</style>