import axios from 'axios';
import TomSelect from 'tom-select';
import Swal from 'sweetalert2';
import "toastify-js/src/toastify.css";
import Toastify from 'toastify-js';



window.Toastify = Toastify;
window.axios = axios;
window.Tom = TomSelect;
window.Swal = Swal;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
