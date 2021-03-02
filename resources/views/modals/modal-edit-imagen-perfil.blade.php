<div class="modal fade" id="modal-foto-perfil">
  <style media="screen">
  @charset "UTF-8";
i {
vertical-align: middle;
font-family: untitled-font-1;
}

* {
font-family: "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "微軟正黑體", "Microsoft JhengHei", sans-serif;
}

.bg-primary {
background-color: #506cc0 !important;
}

.text-primary {
color: #506cc0 !important;
}

.text-secondary {
color: #32dbb3 !important;
}

.text-danger {
color: #ff8409 !important;
}

.text-warning {
color: #ffd62f !important;
}

.text-gray {
color: #999999 !important;
}

.text-pink {
color: #FF8A80;
}

.pseudo, .set-tab .col-6 .open::before, .set-content::before {
content: "";
display: block;
}

.grad-desk, #Subheader {
background: #506cc0;
background: -webkit-linear-gradient(45deg, #506cc0, #32dbb3);
background: -o-linear-gradient(45deg, #506cc0, #32dbb3);
background: -moz-linear-gradient(45deg, #506cc0, #32dbb3);
background: linear-gradient(45deg, #506cc0, #32dbb3);
opacity: 0.9;
}

h5 {
line-height: 1.5;
}

h6 {
font-size: 1.05rem;
line-height: 1.5;
}

.object-center, .custom-file .rounded img, .custom-file .guider-photo-upload img, .custom-file .add-photo img, .custom-file .rounded p, .custom-file .guider-photo-upload p, .custom-file .add-photo p {
position: absolute;
margin: auto;
left: 0;
right: 0;
top: 0;
bottom: 0;
}

.align-center {
align-items: center;
}

.vertical-mid:before {
content: '';
display: inline-block;
height: 100%;
vertical-align: middle;
}
.vertical-mid > div {
display: inline-block;
vertical-align: middle;
}

.select-none, .person-counter {
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

.shadow, .card, .set-tab .col-6 .open, .set-content, .ui-state-default {
box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
}

.img-round, .member-photo {
border-radius: 50%;
overflow: hidden;
}

.max-img img {
max-width: 100%;
}

.detail-img {
max-height: 120px;
}

.member-photo {
width: 100%;
margin: auto;
border: 5px solid #fff;
box-shadow: 0px 0px 1px #424242;
margin-top: calc(-50% - 2rem);
position: relative;
}
.member-photo img {
width: 100%;
}
.member-photo a {
position: absolute;
display: block;
bottom: 0;
margin: auto;
background: rgba(0, 0, 0, 0.5);
padding: 0.5rem;
left: 0;
right: 0;
text-align: center;
transition: 0.8s;
transform: translateY(50px);
visibility: hidden;
}
.member-photo:hover > a {
text-decoration: none;
color: #fff;
transition: 0.8s;
visibility: visible;
transform: translateY(0px);
}

@media (max-width: 767.98px) {
.col-md-4.col-lg-3 .member-photo {
  width: 40%;
  margin-top: calc(-20% - 2rem);
}
}
@media (max-width: 575.98px) {
.col-md-4.col-lg-3 .member-photo {
  width: 120px;
  margin-top: -60px;
}
}
p {
color: #666666;
}

a {
color: #506cc0;
}

a:hover {
color: #3b55a3;
}

a:focus,
a:active,
button:focus,
button:active,
.btn.focus,
.btn:focus {
outline: none;
-webkit-box-shadow: none;
box-shadow: none;
}

.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show > .btn-primary.dropdown-toggle,
.btn-primary, .btn-primary.disabled, .btn-primary:disabled,
.btn-outline-primary:not(:disabled):not(.disabled):active,
.show > .btn-outline-primary.dropdown-toggle,
.dropdown-item:active {
background-color: #506cc0;
border-color: #506cc0;
}

.btn-primary:hover,
.btn-outline-primary:hover {
background-color: #3b55a3;
border-color: #3b55a3;
}

.btn-outline-primary {
color: #506cc0;
border-color: #506cc0;
}

.btn-secondary, .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show > .btn-secondary.dropdown-toggle {
background-color: #32dbb3;
border-color: #32dbb3;
}

.btn-secondary:hover {
background-color: #24cfa7;
border-color: #24cfa7;
}

.btn-primary.focus,
.btn-primary:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.btn-primary:not(:disabled):not(.disabled):active:focus,
.show > .btn-primary.dropdown-toggle:focus,
.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.show > .btn-outline-primary.dropdown-toggle:focus,
.btn-secondary:not(:disabled):not(.disabled).active:focus, .btn-secondary:not(:disabled):not(.disabled):active:focus, .show > .btn-secondary.dropdown-toggle:focus,
.btn-outline-light:not(:disabled):not(.disabled):active:focus,
.btn-dark:not(:disabled):not(.disabled).active:focus, .btn-dark:not(:disabled):not(.disabled):active:focus, .show > .btn-dark.dropdown-toggle:focus {
-webkit-box-shadow: none;
box-shadow: none;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::before {
background: #506cc0;
}

.custom-control-input:active ~ .custom-control-label::before {
background: #dee2e6;
}

.custom-control-input:focus ~ .custom-control-label::before {
box-shadow: none;
}

.text-secondary {
color: #32dbb3 !important;
}

.text-warning {
color: #ffd62f !important;
}

.text-muted {
color: #999999 !important;
}

.container-fluid.max-95 {
max-width: 95%;
margin: auto;
}

.row {
margin-right: -20px;
margin-left: -20px;
}

.col,
[class*="col-"] {
padding-right: 20px;
padding-left: 20px;
}

@media (max-width: 575.98px) {
.row {
  margin-right: -15px;
  margin-left: -15px;
}

.col,
[class*="col-"] {
  padding-right: 15px;
  padding-left: 15px;
}
}
@media (min-width: 992px) {
.maxwidth {
  max-width: 900px;
  margin: auto;
}
}
.border-dashed, .custom-file .rounded, .custom-file .guider-photo-upload, .custom-file .add-photo {
border: 2px dashed #cccccc;
}

.not-active {
pointer-events: none;
cursor: default;
text-decoration: none;
opacity: .5;
}

.form-control:focus {
-webkit-box-shadow: none;
box-shadow: none;
border-color: #506cc0;
background-color: #f9fafd;
}

.form-control.is-invalid {
border-color: #ff8409;
}
.form-control.is-invalid:focus {
-webkit-box-shadow: none;
box-shadow: none;
border-color: #ff8409;
background-color: #fff7ef;
}

.invalid-feedback {
color: #ff8409;
margin-top: 0.5rem;
font-size: 100%;
}

.input-group-text {
background: #fff;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
margin: 0;
}

.custom-file-label:after {
display: none;
}

.custom-file-input {
position: absolute;
top: 0;
padding-bottom: 56.25%;
cursor: pointer;
    opacity: 0;
}

.br-50 ~ .custom-file-input {
width: 56.25%;
border-radius: 50% !important;
margin: auto;
left: 0;
right: 0;

}

.custom-file .br-50 {
width: 56.25%;
border-radius: 50% !important;
margin: auto;
overflow: hidden;
background-size: cover;
background-position: center center;
background-repeat: no-repeat;
}
.custom-file .rounded, .custom-file .guider-photo-upload, .custom-file .add-photo {
height: 0;
padding-bottom: 56.25%;
position: relative;
}
.custom-file .rounded img, .custom-file .guider-photo-upload img, .custom-file .add-photo img {
max-height: 100%;
max-width: 100%;
}
.custom-file .rounded p, .custom-file .guider-photo-upload p, .custom-file .add-photo p {
height: max-content;
}
.custom-file .guider-photo-upload {
width: 100%;
overflow: hidden;
background-size: contain;
background-position: center center;
background-repeat: no-repeat;
}
.custom-file .add-photo {
cursor: pointer;
overflow: hidden;
}

input[type=text].only-line {
border: 0;
border-bottom: 1px solid #cccccc;
padding-right: 0;
padding-left: 0;
-webkit-border-radius: 0;
-moz-border-radius: 0;
-ms-border-radius: 0;
border-radius: 0;
}
input[type=text].only-line:focus {
background: none;
border-color: #506cc0;
}

.form-check label {
margin-left: 0.5rem;
position: absolute;
line-height: 2rem;
}

input[type="checkbox"] {
width: 1.2rem;
height: 1.2rem;
cursor: pointer;
position: relative;
outline: none;
}
input[type="checkbox"]:not(:checked):before {
content: "";
width: 1.2rem;
height: 1.2rem;
display: block;
background: #fff;
border: 1px solid #cccccc;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-ms-border-radius: 2px;
border-radius: 2px;
}
input[type="checkbox"]:checked:before {
content: "";
width: 1.2rem;
height: 1.2rem;
display: block;
background: #506cc0;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-ms-border-radius: 2px;
border-radius: 2px;
}
input[type="checkbox"]:checked:after {
content: "";
display: inline-block;
position: absolute;
left: 35%;
top: 15%;
width: 30%;
height: 50%;
border-right: 2px solid #fff;
border-bottom: 2px solid #fff;
transform: rotate(45deg);
}

.set-choose input {
position: absolute;
opacity: 0;
}
.set-choose label {
width: 100%;
white-space: inherit;
margin-bottom: 0;
}
.set-choose label:hover {
background-color: transparent;
color: #506cc0;
}
.set-choose input:checked + label {
background: #506cc0;
color: #fff;
}

.sm-select {
-webkit-appearance: none;
-moz-appearance: none;
padding: 0rem .75rem;
text-align-last: center;
font-size: 12px;
margin-bottom: .5rem;
max-height: 2rem;
}
.sm-select::-ms-expand {
display: none;
}

span.rainbow {
padding-left: 35px;
background-image: url(/guider-project/img/rainbow.png);
background-repeat: no-repeat;
background-size: contain;
}

.sm-2-pr, .md-2-pr {
margin-right: -10px;
padding-right: 10px;
}

.sm-4-pr, .md-4-pr {
margin-right: -5px;
padding-right: 5px;
}

@media (max-width: 991.98px) {
.lg-mb-3 {
  margin-bottom: 2rem;
}

.lg-mb-5 {
  margin-bottom: 6rem;
}

.lg-mt-3 {
  margin-top: 2rem;
}
}
@media (max-width: 767.98px) {
.md-mb-3 {
  margin-bottom: 2rem;
}

.md-mt-3 {
  margin-top: 2rem;
}

.md-2-pr, .md-4-pr {
  padding-right: 20px;
}
}
@media (max-width: 575.98px) {
.sm-2-pr, .sm-4-pr, .md-2-pr, .md-4-pr {
  padding-right: 15px;
}
}
ol {
list-style-type: decimal-leading-zero;
padding-left: 25px;
}
ol ol {
list-style-type: upper-alpha;
padding-left: 20px;
}
ol ol ol {
list-style-type: lower-alpha;
}

.nav-link {
line-height: 45px;
}

.modal-open .modal {
padding-right: 0 !important;
}

.modal-content {
border: 0;
border-radius: 0;
}

.modal-header {
padding: 0.5rem 1.5rem;
}

.modal-body {
padding: 1rem 1.5rem;
}

.modal-footer {
justify-content: center;
}

@media (max-width: 575.98px) {
.modal-dialog {
  margin: 0;
}
}
.card {
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
-ms-border-radius: 0px;
border-radius: 0px;
border: 0;
}

.card-header:first-child {
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
-ms-border-radius: 0px;
border-radius: 0px;
border: 0;
}

.card-img-top {
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
-ms-border-radius: 0px;
border-radius: 0px;
}

.list-group-item.active {
background-color: #506cc0;
border-color: #506cc0;
}

.badge-primary {
background-color: #506cc0;
}

.badge-secondary {
background-color: #32dbb3;
}

.list-group-item.active .badge-secondary {
background-color: #fff;
color: #506cc0;
}

.list-group-flush .list-group-item {
border: 1px solid rgba(0, 0, 0, 0.125);
border-top-width: 1px;
border-bottom-width: 0px;
background: #F1F5FD;
}
.list-group-flush .list-group-item:last-child {
border-bottom-width: 0;
}
.list-group-flush .list-group-item:hover {
background: #D5E2F9;
}
.list-group-flush .list-group-item.active {
background: rgba(103, 149, 234, 0.8);
}
.list-group-flush .list-group-item.active .badge-secondary {
color: rgba(103, 149, 234, 0.8);
}

.list-group-item:last-of-type ~ .list-group-flush .list-group-item:last-of-type {
border-bottom: 1px solid rgba(0, 0, 0, 0.125);
border-bottom-left-radius: .25rem;
border-bottom-right-radius: .25rem;
}

.progress-bar {
background-color: #32dbb3;
}

.step.progress {
background: rgba(103, 149, 234, 0.8);
}

.table {
color: #666666;
}
.table thead th {
border-bottom-width: 1px;
}
.table th {
font-weight: 400;
}

.table-sm .remove-icon {
cursor: pointer;
}

.table-no-line td {
border: 0;
padding: 0;
}

.page-link {
color: #506cc0;
}
.page-link:hover {
color: #3b55a3;
background-color: #f9fafd;
}
.page-link:focus {
box-shadow: none;
}

body {
background-color: #f8f8f8;
}

#Header {
-webkit-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
}
#Header .navbar-light {
background-color: #fff !important;
}

#Subheader .container {
height: 20vh;
padding: 0;
display: flex;
}
#Subheader .col {
padding: 0;
}
#Subheader .title {
font-weight: 700;
align-self: center;
}
#Subheader .container-fluid {
padding: 0;
}
#Subheader .container-fluid .w-100 {
background-size: cover;
background-position: center center;
height: 50vh;
padding: 0;
}

@media (max-width: 575.98px) {
#Subheader h1 {
  padding: 0 15px;
}
}
#Content {
padding-top: 2rem;
padding-bottom: 4rem;
}
#Content .bg-white.shadow:not(.set-edit) form > .row, #Content .bg-white.card:not(.set-edit) form > .row, #Content .set-tab .col-6 .bg-white.open:not(.set-edit) form > .row, .set-tab .col-6 #Content .bg-white.open:not(.set-edit) form > .row, #Content .bg-white.set-content:not(.set-edit) form > .row, #Content .bg-white.ui-state-default:not(.set-edit) form > .row,
#Content .set-edit > .row {
padding-bottom: 2rem;
}
#Content .bg-white.shadow:not(.set-edit) form > .row:first-of-type, #Content .bg-white.card:not(.set-edit) form > .row:first-of-type, #Content .set-tab .col-6 .bg-white.open:not(.set-edit) form > .row:first-of-type, .set-tab .col-6 #Content .bg-white.open:not(.set-edit) form > .row:first-of-type, #Content .bg-white.set-content:not(.set-edit) form > .row:first-of-type, #Content .bg-white.ui-state-default:not(.set-edit) form > .row:first-of-type,
#Content .set-edit > .row:first-of-type {
padding-top: 2rem;
}
#Content .bg-white.shadow:not(.set-edit) form > .row:last-of-type, #Content .bg-white.card:not(.set-edit) form > .row:last-of-type, #Content .set-tab .col-6 .bg-white.open:not(.set-edit) form > .row:last-of-type, .set-tab .col-6 #Content .bg-white.open:not(.set-edit) form > .row:last-of-type, #Content .bg-white.set-content:not(.set-edit) form > .row:last-of-type, #Content .bg-white.ui-state-default:not(.set-edit) form > .row:last-of-type,
#Content .set-edit > .row:last-of-type {
padding-bottom: 4rem;
}
#Content .set-content, #Content .travel-content {
padding-top: 2rem;
padding-bottom: 4rem;
}

.modal-body .set-edit > .row {
padding-bottom: 2rem;
}

@media (max-width: 991.98px) {
.col-lg-4.full-side-bar {
  padding: 0;
}
}
@media (max-width: 767.98px) {
#Content {
  padding-bottom: 2rem;
}
#Content .full-side-bar {
  padding: 0;
}
}
@media (max-width: 575.98px) {
#Content {
  padding-bottom: 0;
}
}
.set-tab .col-6 {
padding: 0;
}
.set-tab .tab-first {
padding-right: 5px;
}
.set-tab .tab-last {
padding-left: 5px;
}
.set-tab .col-6 > div,
.set-tab .col-6 > a {
width: 100%;
height: 100%;
color: #999999;
font-size: 1rem;
display: block;
font-weight: bold;
letter-spacing: 3px;
text-align: center;
background: #eee;
padding: 1rem 0;
cursor: pointer;
}
.set-tab .col-6 > div:hover,
.set-tab .col-6 > a:hover {
text-decoration: none;
}
.set-tab .col-6 .open {
color: #506cc0;
background: #fff;
font-size: 1rem;
display: block;
font-weight: bold;
letter-spacing: 3px;
text-align: center;
padding: 1rem 0;
position: relative;
cursor: default;
}
.set-tab .col-6 .open::before {
width: 100%;
height: 8px;
background: #506cc0;
position: absolute;
top: -5px;
}

.set-content {
background: #fff;
position: relative;
}
.set-content::before {
width: 100%;
height: 20px;
background: #fff;
position: absolute;
right: 0;
top: -5px;
}

.set-btn button {
padding: 0;
background: none;
color: #506cc0;
}
.set-btn button[type="submit"] {
display: none;
}

.set-input {
display: none;
margin-bottom: 2rem;
}

.set-output.row-style {
margin-bottom: 1rem;
}
.set-output.row-style .row {
color: #666666;
margin: 0;
}
.set-output.row-style .row > div {
padding: 10px;
}
.set-output.row-style .row:first-of-type {
padding-top: 0;
}
.set-output.row-style .row:nth-child(2n+1) {
background: rgba(50, 219, 179, 0.1);
}

@media (max-width: 767.98px) {
.set-output.row-style .row > div:first-of-type {
  background: rgba(50, 219, 179, 0.1);
}
.set-output.row-style .row:nth-child(2n+1) {
  background: none;
}
}
.lang-result, .search-option {
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-ms-border-radius: 2px;
border-radius: 2px;
display: inline-block;
font-size: 12px;
padding: 5px 10px;
background: #eeeeee;
margin-right: 10px;
cursor: pointer;
}
.lang-result span, .search-option span {
padding-right: 10px;
}

.search-option {
background: rgba(103, 149, 234, 0.8);
color: #fff;
margin-bottom: 5px;
}

.star-rate .star-yellow, .star-rate .star-half, .star-rate .star-grey {
margin: 3px;
padding: 5px 15px;
background: rgba(255, 255, 255, 0) url("/guider-project/img/star-y.svg") no-repeat center center;
}
.star-rate .star-half {
background: rgba(255, 255, 255, 0) url("/guider-project/img/star-h.svg") no-repeat center center;
}
.star-rate .star-grey {
background: rgba(255, 255, 255, 0) url("/guider-project/img/star-g.svg") no-repeat center center;
}

.star-rate.small i {
padding: 2px 10px;
}

.star-rate .fa-star {
color: #cccccc;
}

.review-list .media {
position: relative;
}
.review-list .media > a {
display: block;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
-ms-border-radius: 50%;
border-radius: 50%;
width: 50px;
margin-right: 1rem;
}
.review-list .media img {
width: 50px;
margin-right: 1rem;
}
.review-list .media span {
color: #999999;
font-size: 12px;
}
.review-list .media p {
margin-bottom: 0;
}
.review-list .media .report-btn {
color: #999999;
cursor: default;
text-align: right;
}
.review-list .star-rate {
position: absolute;
top: 0;
right: 0;
}

.review-action .start-review {
cursor: pointer;
padding-right: 10px;
color: #506cc0;
}
.review-action .start-review.active {
color: #32dbb3;
}
.review-action a:hover {
text-decoration: none;
}

.start-star {
color: #ccc;
font-size: 30px;
line-height: 0;
margin-bottom: 15px;
}
.start-star i {
cursor: pointer;
transition: .3s;
}
.start-star fieldset {
display: inline-block;
}
.start-star fieldset:not(:checked) > input {
position: absolute;
top: 0;
width: 0;
opacity: 0;
}
.start-star fieldset:not(:checked) > label {
cursor: pointer;
color: #cccccc;
float: right;
margin-right: 5px;
}
.start-star fieldset:not(:checked) > label:hover, .start-star fieldset:not(:checked) > label:hover ~ label i {
color: #ffd62f;
}
.start-star fieldset > input:checked ~ label {
color: #ffd62f;
}

@media (max-width: 767.98px) {
.review-action {
  padding-left: 0;
}
.review-action span {
  display: none;
}
}
@media (max-width: 575.98px) {
#Content {
  padding-top: 0;
}

.star-rate.text-right {
  text-align: left !important;
}

.review-list .star-rate {
  position: relative;
}
.review-list .media .report-btn {
  text-align: left;
}
}
.travel-love p {
margin-bottom: 5px;
}
.travel-love i {
font-size: 1.5rem;
padding-right: 10px;
}
.travel-love label {
text-align: left;
}

.person-counter {
position: relative;
}
.person-counter input {
border: none;
font-size: 2rem;
text-align: center;
width: 100%;
}
.person-counter p {
margin-bottom: 0px;
}
.person-counter .num span {
width: 2.8rem;
height: 2.8rem;
display: block;
background: #eeeeee;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
-ms-border-radius: 50%;
border-radius: 50%;
text-align: center;
line-height: 2.8rem;
font-size: .8rem;
position: absolute;
top: 1.5rem;
cursor: pointer;
}
.person-counter .minus {
left: 30px;
}
.person-counter .add {
right: 30px;
}
.person-counter .num .num-limit {
opacity: .5;
cursor: default;
}

.scroll-bar-style::-webkit-scrollbar-track {
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
border-radius: 5px;
background-color: #eeeeee;
}
.scroll-bar-style::-webkit-scrollbar {
height: .6rem;
background-color: transparent;
}
.scroll-bar-style::-webkit-scrollbar-thumb {
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
border-radius: 5px;
background: #cccccc;
}

.info-text {
margin-left: 1rem;
}

@media (max-width: 767.98px) {
.person-info {
  margin-bottom: 2rem;
}
.person-info .info-text {
  text-align: center;
  margin-top: 1rem;
  margin-left: 0;
}
}
@media (max-width: 575.98px) {
.person-info {
  margin: 2rem 0;
}
}
.table-record thead th:not(.long-th) {
min-width: 75px;
width: auto;
}
.table-record thead .long-th {
min-width: 120px;
}
.table-record .btn {
padding: 0;
background: none;
color: #506cc0;
}

#list-table {
width: 100%;
bottom: 0;
left: 1rem;
z-index: 2;
}
#list-table > div {
display: inline-block;
width: 25%;
}
#list-table a {
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
-ms-border-radius: 0px;
border-radius: 0px;
height: 100%;
background: #506cc0;
border: 0;
border-style: solid;
border-right-width: 1px;
border-color: #3b55a3;
color: #fff;
text-align: center;
}
#list-table a.active {
background: #32dbb3;
}
#list-table .sent-btn {
background: #32dbb3;
}

@media (max-width: 575.98px) {
#list-table a {
  padding: .5rem 0;
}
}
.guider-card {
max-width: 280px;
margin: auto;
margin-bottom: 2rem;
}
.guider-card img {
transition: .5s;
}
.guider-card:hover img {
transform: scale(1.1);
transition: .8s;
}
.guider-card .guider-link {
display: block;
padding: 40px 15px 0;
position: relative;
color: #424242;
}
.guider-card .guider-link:hover {
text-decoration: none;
}
.guider-card .guider-best {
margin: auto;
width: 30px;
position: absolute;
left: 0;
right: 0;
top: 20px;
}
.guider-card .member-photo {
max-width: 130px;
margin: 0 auto 1rem;
}
.guider-card .guider-des {
min-height: 160px;
}
.guider-card .guider-des p {
font-size: 13px;
}
.guider-card .guider-cat {
margin: 0;
border-top: 1px solid #eeeeee;
}
.guider-card .guider-cat .text-center {
padding: 1rem 0 0;
cursor: default;
}
.guider-card .guider-cat .text-center:not(:last-of-type) {
border-right: 1px solid #eeeeee;
}
.guider-card .guider-cat .text-center p {
font-size: 13px;
}
.guider-card .guider-cat .text-center h5 {
font-size: 1.25rem;
}
.guider-card .guider-cat .text-center button {
background: none;
border: 0;
padding: 0;
font-size: 1.25rem;
}
.guider-card .guider-cat .text-center .in-wishlist {
color: #FF8A80;
line-height: 1.5;
}
.guider-card .guider-cat .text-center .add-wishlist {
transition: .5s;
color: #cccccc;
}
.guider-card .guider-cat .text-center .add-wishlist:hover {
transition: .5s;
color: #FF8A80;
}
.guider-card .guider-cat .text-center .remove-wishlist {
transition: .5s;
color: #FF8A80;
}
.guider-card .guider-cat .text-center .remove-wishlist:hover {
transition: .5s;
color: #cccccc;
}

#Content.guider-page,
#Content.post-page {
padding: 0;
}

.full-side-bar.stay-ontop {
position: relative;
}
.full-side-bar.stay-ontop #sticky-side-bar {
position: sticky;
top: 77px;
margin-top: -54px;
}
.full-side-bar.stay-ontop #sticky-side-bar .open-icon, .full-side-bar.stay-ontop #sticky-side-bar .close-icon {
width: 45px;
height: 100%;
text-align: center;
cursor: pointer;
}
.full-side-bar.stay-ontop #sticky-side-bar .card-hide {
display: none;
}

.share-icon a {
font-size: 1.5rem;
}

@media (min-width: 992px) {
.full-side-bar.stay-ontop .card-hide {
  display: block !important;
}
}
@media (max-width: 991.98px) {
.full-side-bar.stay-ontop {
  position: fixed;
  margin-top: 0px;
  bottom: -1px;
  width: 100vw;
  right: 0;
  min-height: 0;
  background: #f8f8f8;
}
}
.blog-item {
margin-bottom: 1rem;
}
.blog-item a,
.blog-item a:hover {
text-decoration: none;
color: #424242;
}
.blog-item .card {
box-shadow: none;
background: none;
}
.blog-item .card-body {
padding: 1rem 0;
min-height: 5rem;
}

@media (min-width: 1780px) {
.max-95 .guider-item {
  flex: 0 0 20%;
  max-width: 20%;
}
}
.carousel-item.fullscreen {
width: 100%;
height: calc(100vh - 80px);
}
.carousel-item.fullscreen > div {
height: 100%;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

#amount {
border: 0;
}

.ui-slider {
position: relative;
text-align: left;
height: .8rem;
background: #eeeeee;
max-width: 95%;
}

.ui-slider .ui-slider-range {
background: #32dbb3;
top: 0;
height: 100%;
position: absolute;
z-index: 1;
}

.ui-state-default {
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
-ms-border-radius: 50%;
border-radius: 50%;
border: 1px solid #cccccc;
background: #fff;
top: -.5rem;
margin-left: -.6rem;
position: absolute;
z-index: 2;
width: 1.8rem;
height: 1.8rem;
cursor: default;
}
.ui-state-default:focus {
outline: 0;
}

.advice-des strong {
color: #424242;
}
.advice-des .text-danger strong, .advice-des .text-danger p, .advice-des .text-danger li {
color: #ff8409;
}

#Footer {
background: #eeeeee;
}
#Footer .container-fluid {
border-top: 1px solid #cccccc;
padding: 30px 0;
}
#Footer .container-fluid > .row {
margin: 0;
}
#Footer ul {
list-style-type: none;
padding-left: 0;
}
#Footer li a {
color: #424242;
transition: .53;
font-weight: 700;
}
#Footer li a:hover {
color: #506cc0;
transition: .5;
text-decoration: none;
}
#Footer .social-icon li {
display: inline-block;
}
#Footer .social-icon a {
font-size: 1.5rem;
padding: 0 5px;
}
#Footer .copy-right, #Footer .copy-right a {
color: #666666;
}
#Footer .btn-group {
width: 100%;
}
#Footer .btn-dark {
margin: 5px 5px;
min-width: 10rem;
width: 100%;
}
#Footer .dropdown-menu {
min-width: 97%;
}

@media (min-width: 768px) {
#Footer li {
  display: inline-block;
  margin-right: 10px;
}
}
@media (min-width: 576px) {
#Footer .align-self-end {
  text-align: right;
}
#Footer .btn-group {
  width: auto;
}
#Footer .dropdown-menu {
  min-width: 10rem;
}
#Footer .btn-dark {
  margin: 5px 5px;
  width: auto;
}
}
.custom-file .delete-photo {
position: absolute;
right: -5px;
top: -10px;
z-index: 5;
font-size: 24px;
color: #ff8409;
cursor: pointer;
}
.custom-file .delete-photo .fa-times-circle {
background: #fff;
border-radius: 50%;
}

#expense {
width: calc(100% - 89px);
border-top-right-radius: 0;
border-bottom-right-radius: 0;
}

#currency {
top: 0;
width: 90px;
right: 20px;
border-top-left-radius: 0;
border-bottom-left-radius: 0;
}

.set-input .md-4-pr.img-box:nth-of-type(3), .set-input .md-4-pr.add-img:nth-of-type(3) {
display: none;
}

.img-box, .add-img {
margin-bottom: 1rem;
}
.img-box img, .add-img img {
max-width: 100%;
}

@media (max-width: 767.98px) {
.img-box, .add-img {
  margin-bottom: 10px;
}

.img-box.md-4-pr, .md-4-pr.add-img {
  padding-right: 0px;
  margin-right: -10px;
}
}
@media (max-width: 575.98px) {
#currency {
  right: 15px;
}

.img-box.md-4-pr, .md-4-pr.add-img {
  padding-right: 5px;
  margin-right: -5px;
}
}

  </style>
    <div class="modal-dialog">
      <form class="" action="{{action('UsuariosController@update_foto_perfil')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"  />
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Foto perfil</h4>
          </div>
          <div class="modal-body">
            <div class="custom-file upload-img profile-photo">
                <div class="rounded br-50 mb-3">
                </div>
                <input type="file" accept="image/*" name="foto-perfil" class="custom-file-input" id="profilePhoto" required>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>

    </div>
    <!-- /.modal-dialog -->
  </div>
