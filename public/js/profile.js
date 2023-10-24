const bg = document.getElementById("bgProfile");
const dialog = document.getElementById("dialogProfile");

const replaceClass = (data) => {
    data.value.forEach((element) => {
        data.component.classList.replace(element.old, element.new);
    });
};

const handleProfile = () => {
    if (bg.classList.contains("opacity-0")) {
        replaceClass({
            component: bg,
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
            component: dialog,
            value: [
                {
                    old: "translate-x-[800px]",
                    new: "translate-x-0",
                },
                {
                    old: "md:translate-x-[400px]",
                    new: "md:translate-x-0",
                },
            ],
        });
    } else {
        replaceClass({
            component: bg,
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
            component: dialog,
            value: [
                {
                    old: "translate-x-0",
                    new: "translate-x-[800px]",
                },
                {
                    old: "md:translate-x-0",
                    new: "md:translate-x-[400px]",
                },
            ],
        });
    }
};
