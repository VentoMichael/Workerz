document.addEventListener("DOMContentLoaded", function () {
    const allButtons = document.querySelectorAll('[class^="button-"]');
    const allContents = document.querySelectorAll('[class^="content-"]');

    allButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const buttonClass = Array.from(button.classList).find(className => className.startsWith("button-"));
            const contentClass = buttonClass.replace("button", "content");

            const content = document.querySelector(`.${contentClass}`);
            if (content) {
                toggleContentVisibility(content);
            }

            event.stopPropagation();
        });
    });

    document.body.addEventListener("click", function () {
        closeAllContentSections();
    });

    function toggleContentVisibility(content) {
        allContents.forEach(otherContent => {
            if (otherContent !== content && !otherContent.classList.contains("hidden")) {
                otherContent.classList.add("hidden");
            }
        });

        content.classList.toggle("hidden");
    }

    function closeAllContentSections() {
        allContents.forEach(content => {
            if (!content.classList.contains("hidden")) {
                content.classList.add("hidden");
            }
        });
    }
});
