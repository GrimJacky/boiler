<template>
    <div id="wrap">
        <section>
            <section>
                <div class="container-fluid">
                    <div class="row row-centered">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="steps">
                                <div class="col-sm-3 col-centred col-step-type" :class="{active:steps.home_step.data}" @click="backStep('home')">
                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ0MCA0NDAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ0MCA0NDA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iWE1MSURfMTMzOF8iPjxnIGlkPSJYTUxJRF8xMzM5XyI+PHJlY3QgaWQ9IlhNTElEXzEzNDBfIiB4PSI0MCIgeT0iNDA1IiBzdHlsZT0iZmlsbDojOTFEQzVBOyIgd2lkdGg9IjM2MCIgaGVpZ2h0PSIzNSIvPjwvZz48ZyBpZD0iWE1MSURfMTM0MV8iPjxyZWN0IGlkPSJYTUxJRF8xMzQyXyIgeD0iMTE1IiBzdHlsZT0iZmlsbDojMDA2QzcwOyIgd2lkdGg9IjIxMCIgaGVpZ2h0PSI0NDAiLz48L2c+PGcgaWQ9IlhNTElEXzEzNDNfIj48cmVjdCBpZD0iWE1MSURfMTM0NF8iIHg9IjE2MCIgc3R5bGU9ImZpbGw6IzAwQTFBNzsiIHdpZHRoPSIxMjAiIGhlaWdodD0iNDQwIi8+PC9nPjxnIGlkPSJYTUxJRF8xMzQ1XyI+PHJlY3QgaWQ9IlhNTElEXzEzNDZfIiB4PSIxNjAiIHk9IjM3MCIgc3R5bGU9ImZpbGw6IzAwRDdERjsiIHdpZHRoPSIxMjAiIGhlaWdodD0iNzAiLz48L2c+PGcgaWQ9IlhNTElEXzEzNDdfIj48ZyBpZD0iWE1MSURfMTM0OF8iPjxyZWN0IGlkPSJYTUxJRF8xMzQ5XyIgeD0iMTQ1IiB5PSI2MCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48ZyBpZD0iWE1MSURfMTM1MF8iPjxyZWN0IGlkPSJYTUxJRF8xMzUxXyIgeD0iMjA1IiB5PSI2MCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48ZyBpZD0iWE1MSURfMTM1Ml8iPjxyZWN0IGlkPSJYTUxJRF8xMzUzXyIgeD0iMjY1IiB5PSI2MCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzEzNTRfIj48ZyBpZD0iWE1MSURfMTM1NV8iPjxyZWN0IGlkPSJYTUxJRF8xMzU2XyIgeD0iMTQ1IiB5PSIxMzAiIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzAiIGhlaWdodD0iNDAiLz48L2c+PGcgaWQ9IlhNTElEXzEzNTdfIj48cmVjdCBpZD0iWE1MSURfMTM1OF8iIHg9IjIwNSIgeT0iMTMwIiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgd2lkdGg9IjMwIiBoZWlnaHQ9IjQwIi8+PC9nPjxnIGlkPSJYTUxJRF8xMzU5XyI+PHJlY3QgaWQ9IlhNTElEXzEzNjBfIiB4PSIyNjUiIHk9IjEzMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzEzNjFfIj48ZyBpZD0iWE1MSURfMTM2Ml8iPjxyZWN0IGlkPSJYTUxJRF8xMzYzXyIgeD0iMTQ1IiB5PSIyMDAiIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzAiIGhlaWdodD0iNDAiLz48L2c+PGcgaWQ9IlhNTElEXzEzNjRfIj48cmVjdCBpZD0iWE1MSURfMTM2NV8iIHg9IjIwNSIgeT0iMjAwIiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgd2lkdGg9IjMwIiBoZWlnaHQ9IjQwIi8+PC9nPjxnIGlkPSJYTUxJRF8xMzY2XyI+PHJlY3QgaWQ9IlhNTElEXzEzNjdfIiB4PSIyNjUiIHk9IjIwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzEzNjhfIj48ZyBpZD0iWE1MSURfMTM2OV8iPjxyZWN0IGlkPSJYTUxJRF8xMzcwXyIgeD0iMTQ1IiB5PSIyNzAiIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzAiIGhlaWdodD0iNDAiLz48L2c+PGcgaWQ9IlhNTElEXzEzNzFfIj48cmVjdCBpZD0iWE1MSURfMTM3Ml8iIHg9IjIwNSIgeT0iMjcwIiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgd2lkdGg9IjMwIiBoZWlnaHQ9IjQwIi8+PC9nPjxnIGlkPSJYTUxJRF8xMzczXyI+PHJlY3QgaWQ9IlhNTElEXzEzNzRfIiB4PSIyNjUiIHk9IjI3MCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzEzNzVfIj48ZyBpZD0iWE1MSURfMTM3Nl8iPjxyZWN0IGlkPSJYTUxJRF8xMzc3XyIgeD0iMjA1IiB5PSIzNzAiIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzAiIGhlaWdodD0iNzAiLz48L2c+PC9nPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=" alt="Photo" class="card-img-top step-type">
                                </div>
                                <div class="col-sm-3 col-centred col-step-type" :class="{active:steps.bedrooms_step.data}" @click="backStep('bedrooms')">
                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTggNTgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDU4IDU4OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggc3R5bGU9ImZpbGw6I0Y1RUVFNDsiIGQ9Ik0yLjE4MSwzMS41aDUzLjYzN2MxLjA5NCwwLDEuOTk4LDAuODE5LDIuMTUsMS44NzNjMC4wMjktMC4wNTUsMC4wNDEtMC4xMiwwLjAxNy0wLjE4NUw1NS4xOSwxMC41Yy0wLjY0NS0yLjI3Mi0yLjcyLTQtNS4wODItNEg3Ljg5MmMtMi4zNjIsMC00LjQzNywxLjcyOC01LjA4Miw0TDAuMDE0LDMzLjE4OGMtMC4wMjQsMC4wNjUtMC4wMTIsMC4xMywwLjAxNywwLjE4NUMwLjE4MywzMi4zMTksMS4wODcsMzEuNSwyLjE4MSwzMS41eiIvPjxyZWN0IHg9IjIiIHk9IjQ4LjUiIHN0eWxlPSJmaWxsOiM2QzQxMjc7IiB3aWR0aD0iNyIgaGVpZ2h0PSIzIi8+PHJlY3QgeD0iNDkiIHk9IjQ4LjUiIHN0eWxlPSJmaWxsOiM2QzQxMjc7IiB3aWR0aD0iNyIgaGVpZ2h0PSIzIi8+PHBhdGggc3R5bGU9ImZpbGw6I0JDQjNBQTsiIGQ9Ik01NS44MTksNDEuNUgyLjE4MUMwLjk4Miw0MS41LDAsNDAuNTE4LDAsMzkuMzE5di01LjYzN2MwLTEuMiwwLjk4Mi0yLjE4MSwyLjE4MS0yLjE4MWg1My42MzdjMS4yLDAsMi4xODEsMC45ODIsMi4xODEsMi4xODF2NS42MzdDNTgsNDAuNTE4LDU3LjAxOCw0MS41LDU1LjgxOSw0MS41eiIvPjxwYXRoIHN0eWxlPSJmaWxsOiM5RTZDNTM7IiBkPSJNNTUuODE5LDQ4LjVIMi4xODFDMC45ODIsNDguNSwwLDQ3LjUxOCwwLDQ2LjMxOXYtMi42MzdjMC0xLjIsMC45ODItMi4xODEsMi4xODEtMi4xODFoNTMuNjM3YzEuMiwwLDIuMTgxLDAuOTgyLDIuMTgxLDIuMTgxdjIuNjM3QzU4LDQ3LjUxOCw1Ny4wMTgsNDguNSw1NS44MTksNDguNXoiLz48cGF0aCBzdHlsZT0iZmlsbDojNzM4M0JGOyIgZD0iTTU2LDMxLjVIMnYwYzAtMy4zMTQsMi42ODYtNiw2LTZoNDJDNTMuMzE0LDI1LjUsNTYsMjguMTg2LDU2LDMxLjVMNTYsMzEuNXoiLz48cGF0aCBzdHlsZT0iZmlsbDojQThDOUUzOyIgZD0iTTIyLjE2MywyNS41YzEuMTI4LTEuMTk3LDEuMTEzLTMuMDc4LTAuMDU4LTQuMjQ5bC00Ljg1Ny00Ljg1N2MtMS4xOTMtMS4xOTMtMy4xMjctMS4xOTMtNC4zMTksMGwtNC44NTcsNC44NTdjLTEuMTcxLDEuMTcxLTEuMTg1LDMuMDUyLTAuMDU4LDQuMjQ5SDIyLjE2M3oiLz48cGF0aCBzdHlsZT0iZmlsbDojQThDOUUzOyIgZD0iTTQ4Ljk4NSwyNS41YzEuMTI4LTEuMTk3LDEuMTEzLTMuMDc4LTAuMDU4LTQuMjQ5bC00Ljg1Ny00Ljg1N2MtMS4xOTMtMS4xOTMtMy4xMjctMS4xOTMtNC4zMTksMGwtNC44NTcsNC44NTdjLTEuMTcxLDEuMTcxLTEuMTg1LDMuMDUyLTAuMDU4LDQuMjQ5SDQ4Ljk4NXoiLz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48L3N2Zz4=" alt="Photo" class="card-img-top step-type">
                                </div>
                                <div class="col-sm-3 col-centred col-step-type" :class="{active:steps.bathrooms_step.data}" @click="backStep('bathrooms')">
                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBvbHlnb24gc3R5bGU9ImZpbGw6IzU1NjA4MDsiIHBvaW50cz0iMTUsNTguOTk5IDEyLDU4Ljk5OSAxMiw1NC45OTkgMTcsNTQuOTk5ICIvPjxwb2x5Z29uIHN0eWxlPSJmaWxsOiM1NTYwODA7IiBwb2ludHM9IjQ1LDU4Ljk5OSA0OCw1OC45OTkgNDgsNTQuOTk5IDQzLDU0Ljk5OSAiLz48cGF0aCBzdHlsZT0iZmlsbDojQkRDM0M3OyIgZD0iTTU2LDMzLjk5OWMtMC41NTIsMC0xLTAuNDQ3LTEtMVYyLjQxNmMwLTAuMjQtMC4xNi0wLjM0My0wLjI1Ni0wLjM4M2MtMC4wOTUtMC4wMzgtMC4yODItMC4wOC0wLjQ1MiwwLjA5TDUxLjA1LDUuMzY1Yy0wLjM5MSwwLjM5MS0xLjAyMywwLjM5MS0xLjQxNCwwcy0wLjM5MS0xLjAyMywwLTEuNDE0bDMuMjQyLTMuMjQyYzAuNjkzLTAuNjkyLDEuNzI3LTAuODk2LDIuNjMxLTAuNTIzQzU2LjQxNSwwLjU2LDU3LDEuNDM2LDU3LDIuNDE2djMwLjU4M0M1NywzMy41NTEsNTYuNTUyLDMzLjk5OSw1NiwzMy45OTl6Ii8+PGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6IzU1NjA4MDtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7IiB4MT0iMSIgeTE9IjU4Ljk5OSIgeDI9IjU5IiB5Mj0iNTguOTk5Ii8+PGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6IzEwODFFMDtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDtzdHJva2UtZGFzaGFycmF5OjEsMzsiIHgxPSI0NyIgeTE9IjExLjk5OSIgeDI9IjQ3IiB5Mj0iMjguOTk5Ii8+PGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6IzEwODFFMDtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDtzdHJva2UtZGFzaGFycmF5OjEsMzsiIHgxPSI0MSIgeTE9IjcuOTk5IiB4Mj0iMTkuNSIgeTI9IjI5LjQ5OSIvPjxsaW5lIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlOiMxMDgxRTA7c3Ryb2tlLXdpZHRoOjI7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7c3Ryb2tlLWRhc2hhcnJheToxLDM7IiB4MT0iNDQiIHkxPSIxMC45OTkiIHgyPSIzNCIgeTI9IjI4Ljk5OSIvPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNFQUVCRjA7IiBkPSJNMTIsMzIuOTk5SDNjLTEuMSwwLTIsMC45LTIsMnMwLjksMiwyLDJoOVYzMi45OTl6Ii8+PHBhdGggc3R5bGU9ImZpbGw6I0VBRUJGMDsiIGQ9Ik01NywzMi45OTlIMjN2NGgzNGMxLjEsMCwyLTAuOSwyLTJTNTguMSwzMi45OTksNTcsMzIuOTk5eiIvPjwvZz48cGF0aCBzdHlsZT0iZmlsbDojRDZEOURGOyIgZD0iTTIzLDM2Ljk5OXYxMUgxMnYtMTFIM2wzLjcyMiwxMy4zOTljMC43NTUsMi43MTksMy4yMzEsNC42MDEsNi4wNTMsNC42MDFoMzQuNDUxYzIuODIyLDAsNS4yOTctMS44ODIsNi4wNTMtNC42MDFMNTcsMzYuOTk5SDIzeiIvPjxwYXRoIHN0eWxlPSJmaWxsOiM3MzgzQkY7IiBkPSJNNTAuNTA5LDExLjU2NGwtNy4wNzEtNy4wNzFsMCwwYzEuODYxLTEuODYxLDQuODc5LTEuODYxLDYuNzQsMGwwLjMzMSwwLjMzMUM1Mi4zNyw2LjY4NSw1Mi4zNyw5LjcwMyw1MC41MDksMTEuNTY0TDUwLjUwOSwxMS41NjR6Ii8+PHJlY3QgeD0iMTIiIHk9IjMwLjk5OSIgc3R5bGU9ImZpbGw6IzI2Qjk5QTsiIHdpZHRoPSIxMSIgaGVpZ2h0PSIxNyIvPjxyZWN0IHg9IjEyIiB5PSI0My45OTkiIHN0eWxlPSJmaWxsOiMxQTkxNzI7IiB3aWR0aD0iMTEiIGhlaWdodD0iNCIvPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjwvc3ZnPg==" alt="Photo" class="card-img-top step-type">
                                </div>
                                <div class="col-sm-3 col-centred col-step-type" :class="{active:steps.cylinder_step.data}" @click="backStep('cylinder')">
                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAxIDUxMi4wMDEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDEgNTEyLjAwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIHN0eWxlPSJmaWxsOiNFNkU2RTY7IiBkPSJNMzg3LjE5LDQ0Ny41MjJIMTI0LjgxYy0xNy4zNjcsMC0zMS40NDUtMTQuMDc4LTMxLjQ0NS0zMS40NDZWNDAuNDAxYzAtMTcuMzY3LDE0LjA3OC0zMS40NDUsMzEuNDQ1LTMxLjQ0NWgyNjIuMzc5YzE3LjM2NywwLDMxLjQ0NiwxNC4wNzgsMzEuNDQ2LDMxLjQ0NXYzNzUuNjc1QzQxOC42MzYsNDMzLjQ0NCw0MDQuNTU3LDQ0Ny41MjIsMzg3LjE5LDQ0Ny41MjJ6Ii8+PHBhdGggc3R5bGU9ImZpbGw6I0YyRjJGMjsiIGQ9Ik0xMjQuODEsNDIyLjQ0NmMtMy41MTIsMC02LjM2OC0yLjg1Ny02LjM2OC02LjM2OVY0MC40MDFjMC0zLjUxMiwyLjg1Ny02LjM2OSw2LjM2OC02LjM2OWgyNjIuMzc5YzMuNTEyLDAsNi4zNjksMi44NTcsNi4zNjksNi4zNjl2Mzc1LjY3NWMwLDMuNTEyLTIuODU3LDYuMzY5LTYuMzY5LDYuMzY5SDEyNC44MXoiLz48Y2lyY2xlIHN0eWxlPSJmaWxsOiNGNDU1MEY7IiBjeD0iMjU2LjAwNCIgY3k9IjM1OC40NTgiIHI9IjUwLjE1Ii8+PHBhdGggc3R5bGU9ImZpbGw6I0Y3NzM0NjsiIGQ9Ik0yMjAuNTM5LDM5My45MThjMTkuNTg0LDE5LjU4NCw1MS4zMzgsMTkuNTg0LDcwLjkyMywwYzE5LjU4NC0xOS41ODQsMTkuNTg0LTUxLjMzOCwwLTcwLjkyMyIvPjxwYXRoIHN0eWxlPSJmaWxsOiM0RDRENEQ7IiBkPSJNMjU2LDM2Ny40MTJjLTQuOTQ2LDAtOC45NTYtNC4wMS04Ljk1Ni04Ljk1NnYtMTYuNjA4YzAtNC45NDYsNC4wMS04Ljk1Niw4Ljk1Ni04Ljk1NmM0Ljk0NiwwLDguOTU2LDQuMDEsOC45NTYsOC45NTZ2MTYuNjA4QzI2NC45NTYsMzYzLjQwMiwyNjAuOTQ2LDM2Ny40MTIsMjU2LDM2Ny40MTJ6Ii8+PHJlY3QgeD0iMTU4LjY4NCIgeT0iNzUuMzk2IiBzdHlsZT0iZmlsbDojMzVEOEI5OyIgd2lkdGg9IjE5NC42MzkiIGhlaWdodD0iMTk0LjYzOSIvPjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNCOUZDRUY7IiBwb2ludHM9IjM1My4zMTksNzUuMzk4IDE1OC42ODEsMjcwLjAzNyAzNTMuMzE5LDI3MC4wMzcgIi8+PHBhdGggc3R5bGU9ImZpbGw6I0Y0NTUwRjsiIGQ9Ik0yOTUuMzc5LDIzNi4wMWMtMS40MDgsMC0yLjgzNi0wLjMzMy00LjE2Ny0xLjAzNWMtNC4zNzYtMi4zMDYtNi4wNTMtNy43MjItMy43NDctMTIuMDk3YzE0LjQyLTI3LjM2Miw5LjYxNS00Ny41NDEsMi40MTItNjAuMTNjLTMuODAxLDEzLjIyOS0xMS42ODIsMjIuMzI5LTEyLjE5MywyMi45MDhjLTIuNDQ3LDIuNzc3LTYuMzUxLDMuNzYxLTkuODIyLDIuNDc5Yy0zLjQ3Mi0xLjI4Mi01Ljc5Ny00LjU2OS01Ljg1MS04LjI2OWMtMC4zMTgtMjEuNjA3LTcuMjc4LTM3LjMwNS0xNC42NTMtNDcuOTI4Yy0wLjY3NywxNC44NDItNy41MDEsMjguODk4LTE5LjMxOSwzOC43NDdjLTExLjc3OSw5LjgxNi0xNi4wMTksMjYuMDM1LTEwLjU0OSw0MC4zNTlsNC42MDEsMTIuMDUxYzEuNzY1LDQuNjIxLTAuNTUsOS43OTYtNS4xNzIsMTEuNTYxYy00LjYxOSwxLjc2Ni05Ljc5OC0wLjU1LTExLjU2MS01LjE3MmwtNC42MDItMTIuMDUxYy04LjItMjEuNDc2LTEuODQ0LTQ1Ljc5MywxNS44MTYtNjAuNTA5YzEwLjQ1Ni04LjcxMywxNS4wNS0yMi4zNjcsMTEuOTktMzUuNjNsLTIuOTU4LTEyLjgxN2MtMC44MDYtMy40OTYsMC41NS03LjEzNiwzLjQ1LTkuMjVjMi44OTktMi4xMTQsNi43NzktMi4yOTQsOS44NjEtMC40NTljMS4yMzIsMC43MzQsMjMuMjk3LDE0LjIzOCwzNC41NDMsNDQuNzc1Yy0wLjA4Ni0wLjQzLTAuMTg0LTAuODYxLTAuMjk0LTEuMjkzYy0wLjkyMy0zLjYzNCwwLjUxNS03LjQ1NywzLjYwMy05LjU4M2MzLjA4OC0yLjEyNCw3LjE3My0yLjEwMywxMC4yMzcsMC4wNTdjMC41MTksMC4zNjcsMTIuODE0LDkuMTU4LDIwLjgzNywyNS43NDVjNy4zODMsMTUuMjYzLDEyLjU5MSw0MC4yNzYtNC41MjksNzIuNzU4QzMwMS43MDQsMjM0LjI3MSwyOTguNTk1LDIzNi4wMSwyOTUuMzc5LDIzNi4wMXoiLz48Zz48cGF0aCBzdHlsZT0iZmlsbDojMzMzMzMzOyIgZD0iTTM4Ny4xOSwwSDEyNC44MWMtMjIuMjc3LDAtNDAuNCwxOC4xMjQtNDAuNCw0MC40MDF2Mzc1LjY3NWMwLDIyLjI3NywxOC4xMjQsNDAuNDAxLDQwLjQsNDAuNDAxaDk2LjI2NHY0Ni41NjhjMCw0Ljk0Niw0LjAxLDguOTU2LDguOTU2LDguOTU2czguOTU2LTQuMDEsOC45NTYtOC45NTZ2LTQ2LjU2OGgzNC4wM3Y0Ni41NjhjMCw0Ljk0Niw0LjAxLDguOTU2LDguOTU2LDguOTU2YzQuOTQ2LDAsOC45NTYtNC4wMSw4Ljk1Ni04Ljk1NnYtNDYuNTY4aDk2LjI2NGMyMi4yNzcsMCw0MC40MDEtMTguMTI0LDQwLjQwMS00MC40MDFWNDAuNDAxQzQyNy41OTEsMTguMTI0LDQwOS40NjcsMCwzODcuMTksMHogTTQwOS42OCw0MTYuMDc3YzAsMTIuNDAxLTEwLjA4OSwyMi40OS0yMi40OSwyMi40OUgxMjQuODFjLTEyLjQwMSwwLTIyLjQ4OS0xMC4wODktMjIuNDg5LTIyLjQ5VjQwLjQwMWMwLTEyLjQwMSwxMC4wODgtMjIuNDksMjIuNDg5LTIyLjQ5aDI2Mi4zNzljMTIuNDAxLDAsMjIuNDksMTAuMDg5LDIyLjQ5LDIyLjQ5djM3NS42NzVINDA5LjY4eiIvPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzMzMzM7IiBkPSJNMjU2LDI5OS4zNTFjLTMyLjU5MSwwLTU5LjEwNiwyNi41MTUtNTkuMTA2LDU5LjEwNnMyNi41MTUsNTkuMTA2LDU5LjEwNiw1OS4xMDZzNTkuMTA2LTI2LjUxNSw1OS4xMDYtNTkuMTA2UzI4OC41OTEsMjk5LjM1MSwyNTYsMjk5LjM1MXogTTI1NiwzOTkuNjUxYy0yMi43MTQsMC00MS4xOTQtMTguNDgtNDEuMTk0LTQxLjE5NGMwLTIyLjcxNCwxOC40OC00MS4xOTQsNDEuMTk0LTQxLjE5NHM0MS4xOTQsMTguNDgsNDEuMTk0LDQxLjE5NEMyOTcuMTk0LDM4MS4xNzEsMjc4LjcxNCwzOTkuNjUxLDI1NiwzOTkuNjUxeiIvPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzMzMzM7IiBkPSJNMzUzLjMxOSw2Ni40NDJIMTU4LjY4MWMtNC45NDYsMC04Ljk1Niw0LjAxLTguOTU2LDguOTU2djE5NC42MzljMCw0Ljk0Niw0LjAxLDguOTU2LDguOTU2LDguOTU2aDE5NC42MzljNC45NDYsMCw4Ljk1Ni00LjAxLDguOTU2LTguOTU2Vjc1LjM5OEMzNjIuMjc1LDcwLjQ1MiwzNTguMjY1LDY2LjQ0MiwzNTMuMzE5LDY2LjQ0MnogTTM0NC4zNjQsMjYxLjA4MUgxNjcuNjM2Vjg0LjM1NGgxNzYuNzI3VjI2MS4wODF6Ii8+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjwvc3ZnPg==" alt="Photo" class="card-img-top step-type">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <step-home :show="steps.home_step.show"></step-home>
            <step-bedrooms :show="steps.bedrooms_step.show"></step-bedrooms>
            <step-bathrooms :show="steps.bathrooms_step.show"></step-bathrooms>
            <step-cylinder :show="steps.cylinder_step.show"></step-cylinder>
            <step-packages :show="steps.packages_step.show"></step-packages>
            <step-contacts :show="steps.contacts_step.show"></step-contacts>
        </section>
    </div>
</template>

<style>
    @import "../../sass/app.scss";
</style>

<script>
    export default {
        data() {
            return {
                boilers: {},
                steps: {
                    home_step: {
                        data: false,
                        show: true
                    },
                    bedrooms_step: {
                        data: false,
                        show: false
                    },
                    bathrooms_step: {
                        data: false,
                        show: false
                    },
                    cylinder_step: {
                        data: false,
                        show: false
                    },
                    packages_step: {
                        data: false,
                        show: false
                    },
                    contacts_step: {
                        data: false,
                        show: false
                    }
                },
                calculate: {
                    home: false,
                    bedrooms: false,
                    bathrooms: false,
                    cylinder: false
                }
            }
        },
        created() {
            let setBoilers = this.setBoilers;
            axios.get('/script/api/all')
                .then(function (response) {
                    setBoilers(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        methods: {
            setBoilers(boilers) {
                this.boilers = boilers;
            },
            backStep(step){
                if(this.steps[step + '_step'].data)
                {
                    let steps = ['home', 'bedrooms', 'bathrooms', 'cylinder', 'packages', 'contacts'];
                    for(let key in steps)
                    {
                        if(steps[key] === step)
                        {
                            for(let st in steps)
                            {
                                if(st >= key)
                                {
                                    this[steps[st]+'_step'] = {
                                        data: false,
                                        show: false
                                    }
                                }
                            }
                            this[steps[key]+'_step'] = {
                                data: false,
                                show: true
                            }
                        }
                    }
                }
            }
        },
        watch: {
            steps: {
                deep: true,
                handler(data) {
                    /**
                     bathrooms_step
                     bedrooms_step
                     contacts_step
                     cylinder_step
                     home_step
                     */
                    for (let prop in this.calculate)
                    {
                        this.calculate
                    }
                }
            }
        }
    }

</script>
