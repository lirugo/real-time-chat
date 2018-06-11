import algolia from 'algoliasearch'
import autocomoplete from 'autocomplete.js'

var index = algolia('O77TJZGGOT','20f742e10ff20e35215e94b0c43af0e6')

export const userautocomplete = selector => {
    var users = index.initIndex('users')

    return autocomoplete(selector, {}, {
        source: autocomoplete.sources.hits(users, {hitsPerPage:10}),
        displayKey: 'name',
        template: {
            suggestion (suggestion) {
                return '<span>'+ suggestion.name +'</span>'
            },
            empty: '<div class="aa-empty">No people found.</div>'
        }
    })
}