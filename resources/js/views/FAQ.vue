<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div>
        <ContentContainer>
            <div class='pb-[40px] text-link-dark-blue text-[20px]' :style="isImpairedVision ? 'color: black':''">
                <p>Куда я могу обратится, что бы принять ребенка в семью?</p>
                <p>Где получить информацию по восстановлению в родительских правах?</p>
                <p class='mt-[30px]'>По этим вопросам Вам необходимо обратится в органы опеки и попечительства по месту жительства.</p>
                <div class=' mt-[30px]'>
                    <h3 class='font-roboto700'>г.Улан-Удэ</h3>
                    <div class="flex flex-col border text-center mobile">
                        <div class='bg-light-bg border font-bold'>Советский район</div>
                        <div class="border">
                            <p>ул. Советская, 23</p>
                            <p>телефоны:</p>
                            <p>8(3012)21-43-67,</p>
                            <p>8(3012)21-07-39</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Железнодорожный район</div>
                        <div class="border">
                            <p>ул. Октябрьская, 2</p>
                            <p>телефоны:</p>
                            <p>8(3012)44-86-28,</p>
                            <p>8(3012)44-89-74,</p>
                            <p>8(3012)44-67-38</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Октябрьский район</div>
                        <div class="border">
                            <p>ул. Павлова, 1</p>
                            <p>телефоны:</p>
                            <p>8(3012)41-99-75,</p>
                            <p>8(3012)43-64-34,</p>
                            <p>8(3012)43-67-71</p>
                        </div>
                    </div>
                    <table class="table-auto">
                        <thead>
                        <tr class='bg-light-bg'>
                            <th>Советский район</th>
                            <th>Железнодорожный район</th>
                            <th>Октябрьский район</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <p>ул. Советская, 23</p>
                                <p>телефоны:</p>
                                <p>8(3012)21-43-67,</p>
                                <p>8(3012)21-07-39</p>
                            </td>
                            <td>
                                <p>ул. Октябрьская, 2</p>
                                <p>телефоны:</p>
                                <p>8(3012)44-86-28,</p>
                                <p>8(3012)44-89-74,</p>
                                <p>8(3012)44-67-38</p>
                            </td>
                            <td>
                                <p>ул. Павлова, 1</p>
                                <p>телефоны:</p>
                                <p>8(3012)41-99-75,</p>
                                <p>8(3012)43-64-34,</p>
                                <p>8(3012)43-67-71</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class=' mt-[30px]'>
                    <h3 class='font-roboto700'>Районы Республики Бурятия</h3>
                    <div class="flex flex-col border text-center mobile">
                        <div class='bg-light-bg border font-bold'>Баргузинский</div>
                        <div class="border">
                            <p>с. Баргузин, ул. Дзержинского 26</p>
                            <p>8(30131)42-814</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Баунтовский</div>
                        <div class="border">
                            <p>с. Багдарин, ул. Ленина, 22</p>
                            <p>8(30153)42-167</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Бичурский</div>
                        <div class="border">
                            <p>с. Бичура, ул. Советская, 43</p>
                            <p>8(30133)42-090</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Джидинский</div>
                        <div class="border">
                            <p>с. Петропавловка, ул. Терешковой, 8</p>
                            <p>8(30134)42-456</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Еравнинский</div>
                        <div class="border">
                            <p>с. Сосново-Озерское, ул. Первомайская, 113</p>
                            <p>8(30135)21-445</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Закаменский</div>
                        <div class="border">
                            <p>г. Закаменск, ул. Ленина, 17</p>
                            <p>8(30137)46-054</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Заиграевский</div>
                        <div class="border">
                            <p>пгт. Заиграево, ул. Октябрьская, 4</p>
                            <p>8(30136)41-152</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Иволгинский</div>
                        <div class="border">
                            <p>с. Иволгинск, ул. Ленина, 30</p>
                            <p>8(30140) 21-227</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Кабанский</div>
                        <div class="border">
                            <p>с. Кабанск, ул. Кирова, 27</p>
                            <p>8(30148)41-006</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Кижингинский</div>
                        <div class="border">
                            <p>ул. Коммунистическая, 12</p>
                            <p>8(30141)32-232</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Курумканский</div>
                        <div class="border">
                            <p>с. Курумкан, ул. Балдакова, 13</p>
                            <p>8(30149)41-332</p>                        </div>
                        <div class='bg-light-bg border font-bold'>Кяхтинский</div>
                        <div class="border">
                            <p>г. Кяхта, ул. Ленина, 33</p>
                            <p>8(30142)41-082</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Муйский</div>
                        <div class="border">
                            <p>п. Таксимо, ул. Советская, 10а</p>
                            <p>8(30132)55-379</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Мухоршибирский</div>
                        <div class="border">
                            <p>с. Мухоршибирь, ул. Доржиева, 38</p>
                            <p>8(30143)21-974</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Окинский</div>
                        <div class="border">
                            <p>с. Орлик, ул. Советская, д.32</p>
                            <p>8(30150)51-244</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Прибайкальский</div>
                        <div class="border">
                            <p>с. Турунтаево, ул. Ленина, 67</p>
                            <p>8(30144)41-334</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Северо-Байкальский</div>
                        <div class="border">
                            <p>п. Нижнеангарск, ул. Рабочая, 125</p>
                            <p>8(30130)47-086</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Селенгинский</div>
                        <div class="border">
                            <p>г. Гусиноозерск, ул. Пушкина, 12</p>
                            <p>8(30145)45-239</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Тарбагатайский</div>
                        <div class="border">
                            <p>с. Тарбагатай, ул. Школьная, 1</p>
                            <p>8(30146)56-054</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Тункинский</div>
                        <div class="border">
                            <p>с. Кырен, ул. Ленина, 107</p>
                            <p>8(30147)41-668</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>Хоринский</div>
                        <div class="border">
                            <p>с. Хоринск, ул. Первомайская, 41</p>
                            <p>8(30148)22-170</p>
                        </div>
                        <div class='bg-light-bg border font-bold'>г. Северобайкальск</div>
                        <div class="border">
                            <p>г. Северобайкальск, пр. Ленинградский, 7</p>
                            <p>8(30130)23-931</p>
                        </div>
                    </div>
                    <table class="table-auto">
                        <thead>
                        <tr class='bg-light-bg'>
                            <th>Район</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Баргузинский</td>
                            <td>с. Баргузин, ул. Дзержинского 26</td>
                            <td>8(30131)42-814</td>
                        </tr>
                        <tr>
                            <td>Баунтовский</td>
                            <td>с. Багдарин, ул. Ленина, 22</td>
                            <td>8(30153)42-167</td>
                        </tr>
                        <tr>
                            <td>Бичурский</td>
                            <td>с. Бичура, ул. Советская, 43</td>
                            <td>8(30133)42-090</td>
                        </tr>
                        <tr>
                            <td>Джидинский</td>
                            <td>с. Петропавловка, ул. Терешковой, 8</td>
                            <td>8(30134)42-456</td>
                        </tr>
                        <tr>
                            <td>Еравнинский</td>
                            <td>с. Сосново-Озерское, ул. Первомайская, 113</td>
                            <td>8(30135)21-445</td>
                        </tr>
                        <tr>
                            <td>Закаменский</td>
                            <td>г. Закаменск, ул. Ленина, 17</td>
                            <td>8(30137)46-054</td>
                        </tr>
                        <tr>
                            <td>Заиграевский</td>
                            <td>пгт. Заиграево, ул. Октябрьская, 4</td>
                            <td>8(30136)41-152</td>
                        </tr>
                        <tr>
                            <td>Иволгинский</td>
                            <td>с. Иволгинск, ул. Ленина, 30</td>
                            <td>8(30140) 21-227</td>
                        </tr>
                        <tr>
                            <td>Кабанский</td>
                            <td>с. Кабанск, ул. Кирова, 27</td>
                            <td>8(30148)41-006</td>
                        </tr>
                        <tr>
                            <td>Кижингинский</td>
                            <td>ул. Коммунистическая, 12</td>
                            <td>8(30141)32-232</td>
                        </tr>
                        <tr>
                            <td>Курумканский</td>
                            <td>с. Курумкан, ул. Балдакова, 13</td>
                            <td>8(30149)41-332</td>
                        </tr>
                        <tr>
                            <td>Кяхтинский</td>
                            <td>г. Кяхта, ул. Ленина, 33</td>
                            <td>8(30142)41-082</td>
                        </tr>
                        <tr>
                            <td>Муйский</td>
                            <td>п. Таксимо, ул. Советская, 10а</td>
                            <td>8(30132)55-379</td>
                        </tr>
                        <tr>
                            <td>Мухоршибирский</td>
                            <td>с. Мухоршибирь, ул. Доржиева, 38</td>
                            <td>8(30143)21-974</td>
                        </tr>
                        <tr>
                            <td>Окинский</td>
                            <td>с. Орлик, ул. Советская, д.32</td>
                            <td>8(30150)51-244</td>
                        </tr>
                        <tr>
                            <td>Прибайкальский</td>
                            <td>с. Турунтаево, ул. Ленина, 67</td>
                            <td>8(30144)41-334</td>
                        </tr>
                        <tr>
                            <td>Северо-Байкальский</td>
                            <td>п. Нижнеангарск, ул. Рабочая, 125</td>
                            <td>8(30130)47-086</td>
                        </tr>
                        <tr>
                            <td>Селенгинский</td>
                            <td>г. Гусиноозерск, ул. Пушкина, 12</td>
                            <td>8(30145)45-239</td>
                        </tr>
                        <tr>
                            <td>Тарбагатайский</td>
                            <td>с. Тарбагатай, ул. Школьная, 1</td>
                            <td>8(30146)56-054</td>
                        </tr>
                        <tr>
                            <td>Тункинский</td>
                            <td>с. Кырен, ул. Ленина, 107</td>
                            <td>8(30147)41-668</td>
                        </tr>
                        <tr>
                            <td>Хоринский</td>
                            <td>с. Хоринск, ул. Первомайская, 41</td>
                            <td>8(30148)22-170</td>
                        </tr>
                        <tr>
                            <td>г. Северобайкальск</td>
                            <td>г. Северобайкальск, пр. Ленинградский, 7</td>
                            <td>8(30130)23-931</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </ContentContainer>
    </div>
</template>

<style scoped>
table {
    text-align: center;
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

.mobile {
    display: none;
}

@media only screen and (max-width: 550px) {
    .mobile {
        display: flex;
    }
    table {
        display: none;
    }
}
</style>
