@if ($getLabel())
    <label class="block text-sm font-medium text-gray-950 mb-2 dark:text-white">

        {{ $getLabel() }}
    </label>
@endif
<div
    wire:ignore
    x-data="{ rating: @entangle($getStatePath()) }"
    x-init="
    let waitForRater = setInterval(() => {
        if (typeof raterJs !== 'undefined') {
            clearInterval(waitForRater);
            const rater = raterJs({
                element: $el,
                starSize: 28,
                step: 1,
                rating: rating || 0,
                rateCallback: function (newRating, done) {
                    rating = newRating;
                    done();
                },
            });
            $watch('rating', value => rater.setRating(value || 0));
        }
    }, 100);
"

    style="min-height:30px"
></div>

@once
    <link href="https://cdn.jsdelivr.net/npm/rater-js@1.0.1/lib/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/rater-js@1.0.1/index.min.js"></script>
@endonce
