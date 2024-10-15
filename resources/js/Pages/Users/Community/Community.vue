<template>
    <div class="w-[88rem] mx-auto my-8">
        <div class="panel duration-300 rounded-xl mx-auto bg-slate-800 bg-opacity-80 backdrop-filter backdrop-blur-sm">
            <div class="flex h-[37rem] items-center justify-center gap-16">
                <div>
                    <img src="/images/banner-main.svg" alt="logo" class="mix-blend-luminosity" style="width: 400px;">
                </div>
                <div class="text-white max-w-lg text-center md:w-1/2 md:text-left">
                    <h3 class="mb-6 text-4xl font-bold leading-tighter">A massive community of programmers just like you.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident assumenda asperiores laudantium!
                        Voluptatibus quibusdam omnis quas placeat dignissimos alias nisi cumque ad suscipit eos distinctio vel
                        tempore officiis voluptates in aliquam, eligendi numquam dolorum voluptate iure sint. Consequatur
                        tempora error repudiandae ad natus officia reprehenderit quis delectus fuga, accusantium nesciunt quas
                        facilis doloribus voluptatibus praesentium impedit maxime ullam aspernatur repellendus consectetur
                        expedita iure ut non ipsam.
                    </p>
                    <Link href="/register" class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page hidden md:flex w-40 md:order-1 mt-6 xl:mt-8">
                        Get Started for free
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>