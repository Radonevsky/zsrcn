<script setup>
import PageTitle from "../components/PageTitle.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
import PlusIcon from "../components/icons/plusIcon.vue";
import useArticles from "../use/articles.js";
import ArticleCard from "../components/ArticleCard.vue";

const {articles, setArticles, newArticleMode} = useArticles()

const isAdmin = true


function refreshArticles() {
    newArticleMode.value = false
    setArticles()
}

</script>

<template>
    <div>
        <PageTitle title='Наши новости' bgClass='bg-orange'/>
        <div class='pb-[60px]' :class='isAdmin && !newArticleMode ? "pt-[25px] " : "pt-[77px] "'>
            <ContentContainer>
                <button
                    v-if='isAdmin && !newArticleMode'
                    class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                    @click='newArticleMode = true'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Добавить новость
                    </span>
                    <plusIcon></plusIcon>
                </button>
                <div class='flex flex-col gap-[60px]'>
                    <ArticleCard
                        v-if='isAdmin && newArticleMode'
                        :create='true'
                        @articleCreated='refreshArticles'/>
                    <ArticleCard
                        v-for='item in articles'
                        :key='item.id'
                        @articleUpdated='refreshArticles'
                        :id='item.id'
                        :title='item.title'
                        :content='item.content'
                        :img_url='item.img_prev_url'
                        :bg-class='item.bgClass'/>
                </div>
                <ShowMoreButton text='показать еще' class='mx-auto mt-[60px]'/>
            </ContentContainer>
        </div>
    </div>
</template>

<style scoped>

</style>
