<script setup>
import PageTitle from "../components/PageTitle.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
    <div>
        <PageTitle title='Наши новости' bgClass='bg-orange'/>
        <div class='pt-[77px] pb-[60px]'>
            <ContentContainer>
                <ShowMoreButton text='показать еще' class='mx-auto'/>
            </ContentContainer>
        </div>
    </div>
</template>

<style scoped>

</style>
