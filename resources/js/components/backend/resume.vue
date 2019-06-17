<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">Resume</h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 subpage-block  edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'education'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="education">
                </a>
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
            <div class="col-sm-6 col-md-4 subpage-block edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'experiences'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="experiences">
                </a>
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
            <div class="col-sm-6 col-md-4 subpage-block edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'skills'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="skills">
                </a>
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
            <div class="col-6">
                <div class="download-cv-block col-6">
                    <a class="button" target="_blank" href="#">Download CV</a>
                </div>
            </div>

            <form class="col-6" name="upLoad">
                <div>
                    <button class="btn-primary col-6" id="upLoadCv" @click="uploadCv()">
                        Upload your CV
                    </button>
                    <input type="file" hidden class="form-control-file" id="upLoadCvInput">
                </div>
            </form>

        </div>
        <div class="modal fade" id="education-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">


                        <form name="education-modal" method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="row" v-for="(v,key) in educations">
                                <div class="col-lg-3 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Year</h5>
                                        <input type="text" name="year"
                                               class="form-control "
                                               v-model="v.time"
                                               required="required" data-error="value" placeholder="Year">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Degree</h5>
                                        <input type="text" name="degree"
                                               class="form-control "
                                               v-model="v.degree"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>School</h5>
                                        <input type="text" name="school"
                                               class="form-control "
                                               v-model="v.school"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Description</h5>
                                        <textarea name="detail" rows="2"
                                                  v-model="v.detail"
                                                  required="required" data-error="Please, leave me a message."
                                                  class="form-control"></textarea>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <button type="button" class="button btn-block mb-0"
                                                @click="delEducation(key)">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <button type="button" class="btn-primary float-right" @click="addNewEducation()">Add new
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelEducation()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal"
                                @click="saveEducation($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="experiences-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">

                        <form name="experience-modal" method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="row" v-for="(v,key) in experiences">
                                <div class="col-lg-3 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Year</h5>
                                        <input type="text" name="year"
                                               class="form-control "
                                               v-model="v.time"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Position</h5>
                                        <input type="text" name="degree"
                                               class="form-control "
                                               v-model="v.position"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Company</h5>
                                        <input type="text" name="school"
                                               class="form-control "
                                               v-model="v.company"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Description</h5>
                                        <textarea name="detail" rows="2"
                                                  v-model="v.detail"
                                                  required="required" data-error="Please, leave me a message."
                                                  class="form-control"></textarea>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <button type="button" class="button btn-block mb-0"
                                                @click="delExperience(key)">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <button type="button" class="btn-primary float-right" @click="addNewExperience()">Add new
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelExperience()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal"
                                @click="saveExperience($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="skills-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">
                        <form id="experience-modal" name="experience-modal" method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="messages"></div>
                            <div class="row controls" v-for="(value,key) in skills">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5 style="color: #E45A5C">Skill set name</h5>
                                        <input type="text" name="year"
                                               class="form-control "
                                               v-model="value.title"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12" v-for="(v,k) in value.skillDetail">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group p-0">
                                                <h5>Skill name</h5>
                                                <input type="text" name="degree"
                                                       class="form-control "
                                                       v-model="v.skillName"
                                                       required="required" data-error="required" placeholder="Skill name">
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <div class="form-group p-0">
                                                <h5>How good?</h5>
                                                <select class="custom-select form-control"
                                                        v-model="v.percent"
                                                        required="required" data-error="value">
                                                    <option value="10">100%</option>
                                                    <option value="8">80%</option>
                                                    <option value="6">60%</option>
                                                    <option value="4">40%</option>
                                                    <option value="2">20%</option>
                                                </select>
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-xs-12">
                                            <div class="form-group p-0">
                                                <h5>&nbsp;</h5>
                                                <button type="button" class="button btn-block mb-0"
                                                        @click="delSkill(key,k)">Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12 ">
                                    <div class="form-group p-0 col-4 float-right">
                                        <button type="button" class="btn-primary btn-sm btn-block mb-0"
                                                @click="addNewSkill(key)">Add new skill
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12 ">
                                    <div class="form-group p-0">
                                        <button type="button" class="button btn-block mb-0"
                                                @click="delSkillSet(key)">Delete skill set
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <button type="button" class="btn-primary float-right col-6" @click="addNewSkillSet()">Add new
                            Skill Set
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelSkillSets()">
                            Cancel
                        </button>
                        <button type="submit" class="button btn-send" data-dismiss="modal"
                                @click="saveSkillSets($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "vueResume.vue",
        data: function () {
            return {
                isActive: false,
                educations: [
                    {
                        time: '2010',
                        degree: 'Bachelor',
                        school: 'CPIT',
                        detail: 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.'
                    },
                    {
                        time: '2010',
                        degree: 'Bachelor',
                        school: 'CPIT',
                        detail: 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.'
                    },
                ],
                experiences: [
                    {
                        time: 'Dec 2012 - Current',
                        position: 'Frontend-developer',
                        company: 'Web Agency',
                        detail: 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.'
                    },
                    {
                        time: 'Dec 2011 - Nov 2012',
                        position: 'Web Designer',
                        company: 'Apple Inc.',
                        detail: 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.'
                    },
                ],
                skills: [
                    {
                        title: 'Design Skills',
                        skillDetail: [
                            {skillName: 'Web Design', percent: 4},
                            {skillName: 'Graphic Design', percent: 4},
                            {skillName: 'Print Design', percent: 6},
                        ]
                    },
                    {
                        title: 'Coding Skills',
                        skillDetail: [
                            {skillName: 'HML5', percent: 2},
                            {skillName: 'CSS3', percent: 4},
                            {skillName: 'jQuery', percent: 8},
                            {skillName: 'Wordpress', percent: 10},
                            {skillName: 'PHP', percent: 2},
                            {skillName: 'Laravel', percent: 8},
                        ]
                    },
                ],

                showEducations: [],
                showExperiences: [],
                showSkills: [],
            }
        },
        created() {
            this.setShowEducations(this.educations);
            this.setShowExperiences(this.experiences);
            this.setShowSkills(this.skills);
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
            /**
             * Upload CV
             */
            uploadCv(){
                $("#upLoadCvInput:hidden").trigger('click');
            },

            /**
             *  Edit skills data
             *  @param key is the key of data 'skill'
             *  @param k is the key of data 'skill[key].skillDetail' key
             */
            delSkill(key,k) {
                this.skills[key].skillDetail.splice(k, 1);
            },
            addNewSkill(key) {
                var item = {};
                this.skills[key].skillDetail.push(item);
            },
            delSkillSet(key) {
                this.skills.splice(key, 1);
            },
            addNewSkillSet() {
                var item = {title:'', skillDetail:[]};
                this.skills.push(item);
            },
            saveSkillSets(e) {

                this.setShowSkills(this.skills);
            },
            cancelSkillSets() {
                this.skills = JSON.parse(JSON.stringify(this.showSkills));
            },
            /**
             *  Edit experience data
             */
            delExperience(key) {
                this.experiences.splice(key, 1);
            },
            addNewExperience() {
                var item = {};
                this.experiences.push(item);
            },
            saveExperience(e) {
                // console.log(this.experiences);

                this.setShowExperiences(this.experiences);
            },
            cancelExperience() {
                this.experiences = JSON.parse(JSON.stringify(this.showExperiences));
            },
            /**
             *  Edit Education data
             */
            delEducation(key) {
                this.educations.splice(key, 1);
            },
            addNewEducation() {
                var item = {};
                this.educations.push(item);
            },
            saveEducation(e) {
                this.setShowEducations(this.educations);
            },
            cancelEducation() {
                this.educations = JSON.parse(JSON.stringify(this.showEducations));
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

