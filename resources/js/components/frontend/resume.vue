<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">Resume</h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 subpage-block">
                <div class="block-title">
                    <h3>Education</h3>
                </div>
                <div class="timeline">
                    <!-- Single event -->
                    <div class="timeline-event te-primary" v-for="(v,key) in showEducations">
                        <h5 class="event-date">{{v.time}}</h5>
                        <h4 class="event-name">{{v.degree}}</h4>
                        <span class="event-description">{{v.school}}</span>
                        <p>{{v.detail}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 subpage-block">
                <div class="block-title">
                    <h3>Experience</h3>
                </div>
                <div class="timeline">
                    <!-- Single event -->
                    <div class="timeline-event te-primary" v-for="(v,k) in showExperiences">
                        <h5 class="event-date">{{v.time}}</h5>
                        <h4 class="event-name">{{v.position}}</h4>
                        <span class="event-description">{{v.company}}</span>
                        <p>{{v.detail}}</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-md-4 subpage-block">
                <div v-for="(value,k) in showSkills">
                    <div class="block-title">
                        <h3>{{value.title}}</h3>
                    </div>
                    <div class="skills-info">
                        <div v-for="(v,k) in value.skillDetail">
                            <h4>{{v.skillName}}</h4>
                            <div class="skill-container">
                                <div class="skill-percentage" v-bind:class="skillPercent(v.percent)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="download-cv-block col-12 text-center">
                    <a class="button" download="" :href="cvUrl.url">Download my newest CV</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "frontVueResume.vue",
        data: function () {
            return {
                isActive: false,
                educations: [],
                experiences: [],
                skills: [],
                cvUrl: {},
                showEducations: [],
                showExperiences: [],
                showSkills: [],
            }
        },
        created() {
            this.getResumeInfo();

        },
        computed: {
            // get skill percentage css style for each skill
            skillPercent() {
                return function (obj) {
                    return 'skill-' + obj;
                }
            },
        },
        methods: {
            // fetch data
            getResumeInfo() {
                axios.get('/getResume/' + this.$uToken)
                    .then((res) => {
                        this.educations = res.data.educations;
                        this.experiences = res.data.experiences;
                        this.skills = res.data.skills;
                        this.cvUrl = res.data.cvUrl;
                        this.setShowEducations(this.educations);
                        this.setShowExperiences(this.experiences);
                        this.setShowSkills(this.skills);
                    });
            },
            /**
             *Set show data on page
             * @param arr
             */
            setShowEducations(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showEducations = JSON.parse(JSON.stringify(arr));
            },
            setShowExperiences(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showExperiences = JSON.parse(JSON.stringify(arr));
            },
            setShowSkills(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showSkills = JSON.parse(JSON.stringify(arr));
            }
        }
    }
</script>

