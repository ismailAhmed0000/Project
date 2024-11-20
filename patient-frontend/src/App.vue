<template>
  <div id="app">
    <!-- Ensure there’s only a single router-view here -->
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style>
/* Global styles can go here */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #f0f2f5;
}

#app {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
