// project paths are set in package.json
const paths = require("./package.json").paths;

const gulp = require("gulp");
const postcss = require("gulp-postcss");
const purgecss = require("gulp-purgecss");
const tailwindcss = require("tailwindcss");
const browserSync = require("browser-sync").create();

// Custom extractor for purgeCSS, to avoid stripping classes with `:` prefixes
class TailwindExtractor {
    static extract(content) {
        return content.match(/[A-z0-9-:\/]+/g) || [];
    }
}

// compiling tailwind CSS
gulp.task("css", () => {
    return gulp
        .src(paths.src.css + "*.css")
        .pipe(
            postcss([tailwindcss(paths.config.tailwind), require("autoprefixer")])
        )
        .pipe(
            purgecss({
                content: [paths.dist.base + "*.php"],
                extractors: [
                    {
                        extractor: TailwindExtractor,
                        extensions: ["php", "js"]
                    }
                ]
            })
        )
        .pipe(gulp.dest(paths.dist.css));
});

// browser-sync dev server
gulp.task('serve', gulp.series('css', function () {
    browserSync.init({
        proxy: paths.dist.proxy
    });

    gulp.watch(paths.src.css + "*.css", gulp.series("css"));
    gulp.watch(paths.config.tailwind, gulp.series("css"));
    gulp.watch(paths.dist.base + "*.php").on("change", browserSync.reload);
}));

// default task
gulp.task("default", gulp.series("serve"));