const bgModal = document.getElementById("bg");
const dialogModal = document.getElementById("dialog");



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

console.log("dwadwa");
