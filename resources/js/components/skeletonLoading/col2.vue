<template>
  <div :class="{ hidden: !show }" class="grid grid-cols-2 mt-20 gap-10">
    <div class="col">
      <div class="line w-full h-[100px] rounded-lg"></div>
    </div>
    <div class="col">
      <div class="line w-full h-[100px] rounded-lg"></div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["show"],
};
</script>

<style scoped>
html .col .line {
  background-image: linear-gradient(90deg, #ddd 0px, #e8e8e8 40px, #ddd 80px);
  animation: shine-lines 1.6s infinite linear;
}
html.dark .col .line {
  background-image: linear-gradient(
    90deg,
    #303132 0px,
    #1d232a 40px,
    #191e24 80px
  );
  animation: shine-lines 1.6s infinite linear;
}
@keyframes shine-lines {
  0% {
    background-position: -100px;
  }
  100% {
    background-position: 1100px;
  }
}
</style>