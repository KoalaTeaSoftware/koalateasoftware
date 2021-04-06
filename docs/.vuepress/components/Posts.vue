<template>
  <div class="post-container">
    <router-link v-for="page in pages" :to="page.path">
      <div class="post-card">
        <img class="article-image" src="../public/images/banner.gif"/>
        <div class="page-detail">
          <div class="page-title">{{ page.title }}</div>
          <div class="page-description">{{ page.frontmatter.description }}</div>
          <div class="page-author">Author: {{ page.frontmatter.author }}</div>
        </div>
      </div>
    </router-link>
  </div>
</template>
<script>
// ToDo: make a property that corresponds to the 'category'.
// if it is omitted, then don't filter by category
export default {
  data() {
    return {
      pages: []
    }
  },
  props: ['category'],
  mounted() {
    const categorised = this.category.length > 0
    this.$site.pages.forEach(page => {
      if (page.frontmatter.type === 'article')
        if (categorised) {
          if (page.frontmatter.category === this.category)
            this.pages.push(page)
        } else {
          this.pages.push(page)
        }
    })
  }
}
</script>
<style scoped>
.post-container {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
}

.post-card {
  width: 600px;
  height: 150px;
  margin: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  padding: 10px;
  display: flex;
  align-items: center;
}

.article-image {
  height: 75%;
}

.page-detail {
  margin-left: 0.5rem;
}

.page-description {
  font-size: small;
}

.description {
  width: 100%;
  display: flex;
  justify-content: center;
}
</style>
