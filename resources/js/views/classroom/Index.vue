<template>
    <DashboardLayout>
        <section class="mt-24 grid grid-cols-2 gap-7 col-span-4 pr-7">
            <div class="card shadow-2xl">
                <div class="card-body">
                    <div class="flex justify-between items-center w-full">
                        <div>
                            <h2 class="card-tittle font-extrabold font-3xl">TNFC-2020-8-3</h2>
                            <p class="font-thin text-sm">Maman Tegar S.kom M.kom</p>
                        </div>
                        <span class="indicator-item indicator-middle indicator-end badge badge-primary">3</span>
                    </div>
                </div>
            </div>
        </section>
    </DashboardLayout>
</template>

<script>
    import DashboardLayout from "../DashboardLayout.vue";

    //actions
    import {getClassrooms} from "../../api/Classroom";
    export default {
        components: {
            DashboardLayout
        },
    };
</script>

<style></style>