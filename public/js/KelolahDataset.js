const bgModal = document.getElementById("bg");
const dialogModal = document.getElementById("dialog");

const d_title = document.getElementById("d_title");
const f_image = document.getElementById("image_file");
const f_name = document.getElementById("name_file");
const konten_paper = document.getElementById("konten_paper");
const form = document.getElementById("form");

const i_judul = document.getElementById("i_judul");
const i_deskripsi = document.getElementById("i_deskripsi");
const i_file = document.getElementById("i_file");
let jenis_paper = [];

const container_form = document.getElementById("container_form");

const loadJenisPaper = (data) => {
    jenis_paper = data;
};

const handleModal = () => {
    if (bgModal.classList.contains("opacity-0")) {
        replaceClass({
            component: bgModal,
            value: [
                {
                    old: "opacity-0",
                    new: "opacity-30",
                },
                {
                    old: "pointer-events-none",
                    new: "pointer-events-auto",
                },
            ],
        });

        replaceClass({
            component: dialogModal,
            value: [
                {
                    old: "translate-x-[800px]",
                    new: "translate-x-0",
                },
                {
                    old: "md:translate-x-[1000px]",
                    new: "md:translate-x-0",
                },
            ],
        });
    } else {
        if (d_title.innerHTML == "Ubah Data") {
            resetForm();
        }

        replaceClass({
            component: bgModal,
            value: [
                {
                    old: "opacity-30",
                    new: "opacity-0",
                },
                {
                    old: "pointer-events-auto",
                    new: "pointer-events-none",
                },
            ],
        });

        replaceClass({
            component: dialogModal,
            value: [
                {
                    old: "translate-x-0",
                    new: "translate-x-[800px]",
                },
                {
                    old: "md:translate-x-0",
                    new: "md:translate-x-[1000px]",
                },
            ],
        });
    }
};

const loadFile = (e) => {
    f_name.innerHTML = e.files[0].name;
    f_image.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40" height="44" viewBox="0 0 13 17" fill="none">
                            <path d="M7.2915 6.12498V1.77081L11.6457 6.12498M1.74984 0.583313C0.871087 0.583313 0.166504 1.2879 0.166504 2.16665V14.8333C0.166504 15.2532 0.333319 15.656 0.630251 15.9529C0.927184 16.2498 1.32991 16.4166 1.74984 16.4166H11.2498C11.6698 16.4166 12.0725 16.2498 12.3694 15.9529C12.6664 15.656 12.8332 15.2532 12.8332 14.8333V5.33331L8.08317 0.583313H1.74984Z" fill="black"/>
                        </svg>`;
};

const tambahPaper = () => {
    const newForm = document.createElement("div");

    var jenis = "";
    jenis_paper.forEach((element) => {
        jenis += `<option value="${element.id_jenis_paper}">${element.jenis_paper}</option>`;
    });

    newForm.className =
        "flex flex-col md:flex-row md:justify-between gap-3 border-2 px-3 rounded-lg pt-2 pb-8 bg-gray-100 relative";
    newForm.innerHTML = `<div onclick="deletePaper(this)" class="bg-red-500 absolute right-4 py-1 rounded-md px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                                fill="none">
                                <path
                                    d="M0.958333 15.3333C0.958333 16.3875 1.82083 17.25 2.875 17.25H10.5417C11.5958 17.25 12.4583 16.3875 12.4583 15.3333V3.83333H0.958333V15.3333ZM13.4167 0.958333H10.0625L9.10417 0H4.3125L3.35417 0.958333H0V2.875H13.4167V0.958333Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="font-poppins-semibold text-lg py-2 border-b-2">Nama Paper</label>
                            <input required class="border-2 px-3 py-2 rounded-lg" type="text" name="nama_paper[]" id="paper1">
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="font-poppins-semibold text-lg py-2 border-b-2">Jenis Paper</label>
                            <select class="border-2 px-3 py-2 rounded-lg appearance-none" type="text" name="jenis_paper[]" id="jenis1">
                                ${jenis}
                            </select>
                        </div>`;

    konten_paper.appendChild(newForm);
    container_form.scrollTo({
        top: container_form.scrollHeight,
        behavior: "smooth",
    });
};

const deletePaper = (e) => {
    e.parentNode.remove();
};

const prosesDataset = () => {
    var err = undefined;
    if (i_judul.value === "") {
        err = "Judul tidak boleh kosong";
    } else if (i_deskripsi.value === "") {
        err = "Deskripsi tidak boleh kosong";
    } 

    if(d_title.innerHTML == "Tambah Data"){
        if (i_file.files.length === 0) {
            err = "File tidak boleh kosong";
        }
    }

    for (let index = 0; index < konten_paper.children.length; index++) {
        const element = konten_paper.children[index];
        if (
            element.children[1].lastElementChild.value === "" ||
            element.children[2].lastElementChild.value === ""
        ) {
            err = "Isi pada field paper terlebih dahulu";
        }
    }

    if (err) {
        Swal.fire("Informasi", err, "warning");
    } else {
        Swal.fire({
            title: "Konfirmasi",
            text: `Apakah anda yakin ingin ${d_title.innerHTML == "Tambah Data" ? 'menambahkan' : 'mengubah'} data?`,
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
};

const resetForm = () => {
    d_title.innerHTML = "Tambah Data";
    i_judul.value = "";
    i_deskripsi.value = "";
    i_file.value = "";

    f_image.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="85" height="60" viewBox="0 0 85 60"
                            fill="none">
                            <path
                                d="M42.5 0.625C31.5562 0.625 22.95 8.93906 21.7467 19.5508C19.4322 19.9237 17.2615 20.9155 15.4646 22.4212C13.6676 23.9269 12.3111 25.8904 11.5387 28.1039C5.00437 29.9872 0 35.815 0 43.125C0 51.9544 7.10813 59.0625 15.9375 59.0625H69.0625C77.8919 59.0625 85 51.9544 85 43.125C85 38.45 82.7289 34.2638 79.4378 31.3366C78.8216 22.0025 71.3761 14.5544 62.0075 14.0709C58.8094 6.29078 51.4728 0.625 42.5 0.625ZM42.5 5.9375C49.8366 5.9375 55.7016 10.6391 57.7734 17.3062L58.3578 19.2188H61.0938C68.4117 19.2188 74.375 25.182 74.375 32.5V33.8281L75.4534 34.6595C76.755 35.6571 77.8126 36.9376 78.5462 38.4043C79.2797 39.8709 79.67 41.4852 79.6875 43.125C79.6875 49.1706 75.1081 53.75 69.0625 53.75H15.9375C9.89188 53.75 5.3125 49.1706 5.3125 43.125C5.3125 37.7594 9.16406 33.5944 14.025 32.7497L15.7702 32.4177L16.1022 30.6698C16.8991 27.0919 20.0706 24.5312 23.9062 24.5312H26.5625V21.875C26.5625 12.9234 33.5484 5.9375 42.5 5.9375ZM42.5 20.7966L40.5875 22.6214L29.9625 33.2464L33.7875 37.0714L39.8438 31.0045V48.4375H45.1562V31.0045L51.2125 37.0661L55.0375 33.2411L44.4125 22.6161L42.5 20.7966Z"
                                fill="#4C5966" />
                        </svg>`;

    f_name.innerHTML = "Klik untuk upload";
    konten_paper.innerHTML = ''
    form.action = "/user/dataset/add"
};

const handleEdit = (data) => {
    form.action = `/user/dataset/update/${data.id_data}`
    d_title.innerHTML = "Ubah Data";

    i_judul.value = data.nama_data;
    i_deskripsi.value = data.deskripsi_data;
    i_file.value = "";
    f_image.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40" height="44" viewBox="0 0 13 17" fill="none">
                            <path d="M7.2915 6.12498V1.77081L11.6457 6.12498M1.74984 0.583313C0.871087 0.583313 0.166504 1.2879 0.166504 2.16665V14.8333C0.166504 15.2532 0.333319 15.656 0.630251 15.9529C0.927184 16.2498 1.32991 16.4166 1.74984 16.4166H11.2498C11.6698 16.4166 12.0725 16.2498 12.3694 15.9529C12.6664 15.656 12.8332 15.2532 12.8332 14.8333V5.33331L8.08317 0.583313H1.74984Z" fill="black"/>
                        </svg>`;

    f_name.innerHTML = data.file_data;

    var kontenHtml = "";

    var jenis = "";
    jenis_paper.forEach((element, index) => {
        data.paper.forEach((elem) => {
            if (elem.id_jenis_paper == element.id_jenis_paper) {
                jenis += `<option selected value="${element.id_jenis_paper}">${element.jenis_paper}</option>`;
            } else {
                jenis += `<option value="${element.id_jenis_paper}">${element.jenis_paper}</option>`;
            }
        });
    });

    data.paper.forEach((item, index) => {
        kontenHtml += `<div class="flex flex-col md:flex-row md:justify-between gap-3 border-2 px-3 rounded-lg pt-2 pb-8 bg-gray-100 relative">
                            <div onclick="deletePaper(this)" class="bg-red-500 absolute right-4 py-1 rounded-md px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                                    fill="none">
                                    <path
                                        d="M0.958333 15.3333C0.958333 16.3875 1.82083 17.25 2.875 17.25H10.5417C11.5958 17.25 12.4583 16.3875 12.4583 15.3333V3.83333H0.958333V15.3333ZM13.4167 0.958333H10.0625L9.10417 0H4.3125L3.35417 0.958333H0V2.875H13.4167V0.958333Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="flex flex-col w-full md:w-1/2">
                                <label class="font-poppins-semibold text-lg py-2 border-b-2">Nama Paper</label>
                                <input required class="border-2 px-3 py-2 rounded-lg" type="text" name="nama_paper[]" value="${item.nama_paper}" id="paper1">
                            </div>
                            <div class="flex flex-col w-full md:w-1/2">
                                <label class="font-poppins-semibold text-lg py-2 border-b-2">Jenis Paper</label>
                                <select class="border-2 px-3 py-2 rounded-lg appearance-none" type="text" name="jenis_paper[]" id="jenis1">
                                    ${jenis}
                                </select>
                            </div>
                        </div>`;
    });

    konten_paper.innerHTML = kontenHtml
    handleModal();
};

const handleDelete = (url) => {
    Swal.fire({
        title: "Konfirmasi",
        text: "Apakah anda yakin ingin menghapus data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonText: "Tidak",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = window.location.origin + url;
        }
    });
}