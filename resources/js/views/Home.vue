<template>
    <div>
        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact_us">
                            <div style="padding: 40px 40px 40px 40px;" class="contact_us_iner">
                                <h1>Tordenkuplen</h1>
                                <p>Denne hjemmeside er en tilfældighedsgenerator baseret på en intern joke om "The Thunderdome" fra Mad Max filmen "Beyond Thunderdome" også kendt som "Mad Max i tordenkuplen"</p>
                                <div class="banner_btn">
                                    <a href="https://en.wikipedia.org/wiki/Mad_Max_Beyond_Thunderdome" class="btn_1">learn
                                        more <span><img src="img/icon/left.svg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->

        <!-- banner part start-->
        <div class="our_speciality">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single_special_part border_left">
                            <img src="img/icon/special_1.svg" alt="">
                            <div class="single_special_text">
                                <h3>Two men enter</h3>
                                <p>One man leaves</p>
                            </div>
                        </div>
                        <div class="single_special_part border_left">
                            <img src="img/icon/special_2.svg" alt="">
                            <div class="single_special_text">
                                <h3>Two men enter</h3>
                                <p>One man leaves</p>
                            </div>
                        </div>
                        <div class="single_special_part border_left">
                            <img src="img/icon/special_3.svg" alt="">
                            <div class="single_special_text">
                                <h3>Two men enter</h3>
                                <p>One man leaves</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner part start-->
        <div class="whole-wrap" style="margin-top: 150px; margin-bottom: 50px">
            <div class="container box_1170">
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                <list-component/>
                            </div>
                        </div>
                        <div class="col-md-4 mt-sm-30">
                            <div class="">
                                <group-component/>
                            </div>
                        </div>
                        <div class="col-md-4 mt-sm-30">
                            <div class="">
                                <element-component/>
                            </div>
                        </div>
                        <div class="col-md-4 mt-sm-30">
                            <div class="">
                                <number-component/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Align Area -->
    </div>
</template>

<script>
// Lists
import Group    from '../components/Random/ListBased/Group'
import Element  from '../components/Random/ListBased/Element'
import List     from '../components/Random/ListBased/List'

// Numbers
import Number   from '../components/Random/NumberBased/Number'

export default {
    components: {
        'group-component': Group,
        'element-component': Element,
        'list-component': List,
        'number-component': Number,
    }
}
</script>
