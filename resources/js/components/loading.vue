<template>
  <div
    class="absolute z-50 left-1/2 top-1/2 w-full h-full -translate-x-1/2 -translate-y-1/2 bg-black/30 flex items-center justify-center"
    :class="{ hidden: show }"
  >
    <span class="loader"></span>
  </div>
</template>

<script>
export default {
  props: ["show"],
};
</script>

<style scoped>
.loader {
  width: 48px;
  height: 48px;
  display: inline-block;
  position: relative;
}
.loader::after,
.loader::before {
  content: "";
  box-sizing: border-box;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  border: 2px solid #fff;
  position: absolute;
  left: 0;
  top: 0;
  animation: animloader 2s linear infinite;
}
.loader::after {
  animation-delay: 1s;
}

@keyframes animloader {
  0% {
    transform: scale(0);
    opacity: 1;
  }
  100% {
    transform: scale(1);
    opacity: 0;
  }
}
</style>