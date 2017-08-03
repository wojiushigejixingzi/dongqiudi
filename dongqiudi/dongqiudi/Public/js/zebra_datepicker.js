(function (a) {
    a.DatePicker = function (z, K) {
        var O = {
            always_visible: false,
            days: ["日", "一", "二", "三", "四", "五", "六"],
            days_abbr: false,
            direction: 0,
            disabled_dates: false,
            enabled_dates: false,
            first_day_of_week: 1,
            format: "Y-m-d",
            header_captions: {days: "F, Y", months: "Y", years: "Y1 - Y2"},
            header_navigation: ["&#171;", "&#187;"],
            inside: true,
            lang_clear_date: "清空",
            months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            months_abbr: false,
            offset: [5, -5],
            pair: false,
            readonly_element: true,
            select_other_months: false,
            show_clear_date: 0,
            show_icon: true,
            show_other_months: true,
            show_select_today: "今天",
            show_week_number: false,
            start_date: false,
            strict: false,
            view: "days",
            weekend_days: [0, 6],
            zero_pad: false,
            onChange: null,
            onClear: null,
            onSelect: null
        };
        var e, N, w, j, T, b, q, Q, o, D, k, A, B, Y, p, G, J, ac, af, aa, v, W, ah, V, I, d, t, U, F, R, f, x, L, s, X, ab;
        var ag = this;
        ag.settings = {};
        var i = a(z);
        var ad = function (aw) {
            if (!aw) {
                ag.settings = a.extend({}, O, K);
                for (var aK in i.data()) {
                    if (aK.indexOf("zdp_") === 0) {
                        aK = aK.replace(/^zdp\_/, "");
                        if (undefined !== O[aK]) {
                            ag.settings[aK] = i.data("zdp_" + aK)
                        }
                    }
                }
            }
            if (ag.settings.readonly_element) {
                i.attr("readonly", "readonly")
            }
            var al = {
                days: ["d", "j", "D"],
                months: ["F", "m", "M", "n", "t"],
                years: ["o", "Y", "y"]
            }, an = false, av = false, au = false, ao = null;
            for (ao in al) {
                a.each(al[ao], function (aM, aN) {
                    if (ag.settings.format.indexOf(aN) > -1) {
                        if (ao == "days") {
                            an = true
                        } else {
                            if (ao == "months") {
                                av = true
                            } else {
                                if (ao == "years") {
                                    au = true
                                }
                            }
                        }
                    }
                })
            }
            if (an && av && au) {
                f = ["years", "months", "days"]
            } else {
                if (!an && av && au) {
                    f = ["years", "months"]
                } else {
                    if (!an && !av && au) {
                        f = ["years"]
                    } else {
                        if (!an && av && !au) {
                            f = ["months"]
                        } else {
                            f = ["years", "months", "days"]
                        }
                    }
                }
            }
            if (a.inArray(ag.settings.view, f) == -1) {
                ag.settings.view = f[f.length - 1]
            }
            v = [];
            aa = [];
            var aq;
            for (var aC = 0; aC < 2; aC++) {
                if (aC === 0) {
                    aq = ag.settings.disabled_dates
                } else {
                    aq = ag.settings.enabled_dates
                }
                if (a.isArray(aq) && aq.length > 0) {
                    a.each(aq, function () {
                        var aQ = this.split(" ");
                        for (var aP = 0; aP < 4; aP++) {
                            if (!aQ[aP]) {
                                aQ[aP] = "*"
                            }
                            aQ[aP] = aQ[aP].indexOf(",") > -1 ? aQ[aP].split(",") : new Array(aQ[aP]);
                            for (var aO = 0; aO < aQ[aP].length; aO++) {
                                if (aQ[aP][aO].indexOf("-") > -1) {
                                    var aN = aQ[aP][aO].match(/^([0-9]+)\-([0-9]+)/);
                                    if (null !== aN) {
                                        for (var aM = r(aN[1]); aM <= r(aN[2]); aM++) {
                                            if (a.inArray(aM, aQ[aP]) == -1) {
                                                aQ[aP].push(aM + "")
                                            }
                                        }
                                        aQ[aP].splice(aO, 1)
                                    }
                                }
                            }
                            for (aO = 0; aO < aQ[aP].length; aO++) {
                                aQ[aP][aO] = isNaN(r(aQ[aP][aO])) ? aQ[aP][aO] : r(aQ[aP][aO])
                            }
                        }
                        if (aC === 0) {
                            v.push(aQ)
                        } else {
                            aa.push(aQ)
                        }
                    })
                }
            }
            var aH = new Date(), ap = !ag.settings.reference_date ? i.data("zdp_reference_date") && undefined !== i.data("zdp_reference_date") ? i.data("zdp_reference_date") : aH : ag.settings.reference_date, aE, aF;
            ah = undefined;
            V = undefined;
            A = ap.getMonth();
            o = aH.getMonth();
            B = ap.getFullYear();
            D = aH.getFullYear();
            Y = ap.getDate();
            k = aH.getDate();
            if (ag.settings.direction === true) {
                ah = ap
            } else {
                if (ag.settings.direction === false) {
                    V = ap;
                    t = V.getMonth();
                    d = V.getFullYear();
                    I = V.getDate()
                } else {
                    if (!a.isArray(ag.settings.direction) && ae(ag.settings.direction) && r(ag.settings.direction) > 0 || a.isArray(ag.settings.direction) && ((aE = l(ag.settings.direction[0])) || ag.settings.direction[0] === true || ae(ag.settings.direction[0]) && ag.settings.direction[0] > 0) && ((aF = l(ag.settings.direction[1])) || ag.settings.direction[1] === false || ae(ag.settings.direction[1]) && ag.settings.direction[1] >= 0)) {
                        if (aE) {
                            ah = aE
                        } else {
                            ah = new Date(B, A, Y + (!a.isArray(ag.settings.direction) ? r(ag.settings.direction) : r(ag.settings.direction[0] === true ? 0 : ag.settings.direction[0])))
                        }
                        A = ah.getMonth();
                        B = ah.getFullYear();
                        Y = ah.getDate();
                        if (aF && +aF >= +ah) {
                            V = aF
                        } else {
                            if (!aF && ag.settings.direction[1] !== false && a.isArray(ag.settings.direction)) {
                                V = new Date(B, A, Y + r(ag.settings.direction[1]))
                            }
                        }
                        if (V) {
                            t = V.getMonth();
                            d = V.getFullYear();
                            I = V.getDate()
                        }
                    } else {
                        if (!a.isArray(ag.settings.direction) && ae(ag.settings.direction) && r(ag.settings.direction) < 0 || a.isArray(ag.settings.direction) && (ag.settings.direction[0] === false || ae(ag.settings.direction[0]) && ag.settings.direction[0] < 0) && ((aE = l(ag.settings.direction[1])) || ae(ag.settings.direction[1]) && ag.settings.direction[1] >= 0)) {
                            V = new Date(B, A, Y + (!a.isArray(ag.settings.direction) ? r(ag.settings.direction) : r(ag.settings.direction[0] === false ? 0 : ag.settings.direction[0])));
                            t = V.getMonth();
                            d = V.getFullYear();
                            I = V.getDate();
                            if (aE && +aE < +V) {
                                ah = aE
                            } else {
                                if (!aE && a.isArray(ag.settings.direction)) {
                                    ah = new Date(d, t, I - r(ag.settings.direction[1]))
                                }
                            }
                            if (ah) {
                                A = ah.getMonth();
                                B = ah.getFullYear();
                                Y = ah.getDate()
                            }
                        } else {
                            if (a.isArray(ag.settings.disabled_dates) && ag.settings.disabled_dates.length > 0) {
                                for (var aG in v) {
                                    if (v[aG][0] == "*" && v[aG][1] == "*" && v[aG][2] == "*" && v[aG][3] == "*") {
                                        var aB = [];
                                        a.each(aa, function () {
                                            var aM = this;
                                            if (aM[2][0] != "*") {
                                                aB.push(parseInt(aM[2][0] + (aM[1][0] == "*" ? "12" : y(aM[1][0], 2)) + (aM[0][0] == "*" ? aM[1][0] == "*" ? "31" : new Date(aM[2][0], aM[1][0], 0).getDate() : y(aM[0][0], 2)), 10))
                                            }
                                        });
                                        aB.sort();
                                        if (aB.length > 0) {
                                            var ak = (aB[0] + "").match(/([0-9]{4})([0-9]{2})([0-9]{2})/);
                                            B = parseInt(ak[1], 10);
                                            A = parseInt(ak[2], 10) - 1;
                                            Y = parseInt(ak[3], 10)
                                        }
                                        break
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if (Z(B, A, Y)) {
                while (Z(B)) {
                    if (!ah) {
                        B--;
                        A = 11
                    } else {
                        B++;
                        A = 0
                    }
                }
                while (Z(B, A)) {
                    if (!ah) {
                        A--;
                        Y = new Date(B, A + 1, 0).getDate()
                    } else {
                        A++;
                        Y = 1
                    }
                    if (A > 11) {
                        B++;
                        A = 0;
                        Y = 1
                    } else {
                        if (A < 0) {
                            B--;
                            A = 11;
                            Y = new Date(B, A + 1, 0).getDate()
                        }
                    }
                }
                while (Z(B, A, Y)) {
                    if (!ah) {
                        Y--
                    } else {
                        Y++
                    }
                    aH = new Date(B, A, Y);
                    B = aH.getFullYear();
                    A = aH.getMonth();
                    Y = aH.getDate()
                }
                aH = new Date(B, A, Y);
                B = aH.getFullYear();
                A = aH.getMonth();
                Y = aH.getDate()
            }
            var ar = l(i.val() || (ag.settings.start_date ? ag.settings.start_date : ""));
            if (ar && ag.settings.strict && Z(ar.getFullYear(), ar.getMonth(), ar.getDate())) {
                i.val("")
            }
            if (!aw) {
                u(ah)
            }
            if (!ag.settings.always_visible) {
                if (!aw) {
                    if (ag.settings.show_icon) {
                        if (g.name == "firefox" && i.is('input[type="text"]') && i.css("display") == "inline") {
                            i.css("display", "inline-block")
                        }
                        var aA = jQuery('<span class="Zebra_DatePicker_Icon_Wrapper"></span>').css({
                            display: i.css("display"),
                            position: i.css("position") == "static" ? "relative" : i.css("position"),
                            "float": i.css("float"),
                            top: i.css("top"),
                            right: i.css("right"),
                            bottom: i.css("bottom"),
                            left: i.css("left")
                        });
                        i.wrap(aA).css({
                            position: "relative",
                            top: "auto",
                            right: "auto",
                            bottom: "auto",
                            left: "auto"
                        });
                        w = jQuery('<button type="button" class="Zebra_DatePicker_Icon' + (i.attr("disabled") == "disabled" ? " Zebra_DatePicker_Icon_Disabled" : "") + '">Pick a date</button>');
                        ag.icon = w;
                        x = w.add(i)
                    } else {
                        x = i
                    }
                    x.bind("click", function (aM) {
                        aM.preventDefault();
                        a(".Zebra_DatePicker").hide();
                        if (!i.attr("disabled")) {
                            if (N.css("display") != "none") {
                                ag.hide()
                            } else {
                                ag.show()
                            }
                        }
                    });
                    if (undefined !== w) {
                        w.insertAfter(i)
                    }
                }
                if (undefined !== w) {
                    w.attr("style", "");
                    if (ag.settings.inside) {
                        w.addClass("Zebra_DatePicker_Icon_Inside")
                    }
                    var at = i.outerWidth(), aD = i.outerHeight(), aL = parseInt(i.css("marginLeft"), 10) || 0, aI = parseInt(i.css("marginTop"), 10) || 0, am = w.outerWidth(), az = w.outerHeight(), ax = parseInt(w.css("marginLeft"), 10) || 0, aJ = parseInt(w.css("marginRight"), 10) || 0;
                    if (ag.settings.inside) {
                        w.css({top: aI + (aD - az) / 2, left: aL + (at - am - aJ)})
                    } else {
                        w.css({top: aI + (aD - az) / 2, left: aL + at + ax})
                    }
                }
            }
            X = ag.settings.show_select_today !== false && a.inArray("days", f) > -1 && !Z(D, o, k) ? ag.settings.show_select_today : false;
            if (aw) {
                return
            }
            a(window).bind("resize.Zebra_DatePicker", function () {
                ag.hide();
                if (w !== undefined) {
                    clearTimeout(ab);
                    ab = setTimeout(function () {
                        ag.update()
                    }, 100)
                }
            });
            var ay = '<div class="Zebra_DatePicker"><table class="dp_header"><tr><td class="dp_previous">' + ag.settings.header_navigation[0] + '</td><td class="dp_caption">&#032;</td><td class="dp_next">' + ag.settings.header_navigation[1] + '</td></tr></table><table class="dp_daypicker"></table><table class="dp_monthpicker"></table><table class="dp_yearpicker"></table><table class="dp_footer"><tr><td class="dp_today"' + (ag.settings.show_clear_date !== false ? ' style="width:50%"' : "") + ">" + X + '</td><td class="dp_clear"' + (X !== false ? ' style="width:50%"' : "") + ">" + ag.settings.lang_clear_date + "</td></tr></table></div>";
            N = a(ay);
            ag.datepicker = N;
            j = a("table.dp_header", N);
            T = a("table.dp_daypicker", N);
            b = a("table.dp_monthpicker", N);
            q = a("table.dp_yearpicker", N);
            s = a("table.dp_footer", N);
            L = a("td.dp_today", s);
            Q = a("td.dp_clear", s);
            if (!ag.settings.always_visible) {
                a("body").append(N)
            } else {
                if (!i.attr("disabled")) {
                    ag.settings.always_visible.append(N);
                    ag.show()
                }
            }
            N.delegate("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked, .dp_week_number)", "mouseover", function () {
                a(this).addClass("dp_hover")
            }).delegate("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked, .dp_week_number)", "mouseout", function () {
                a(this).removeClass("dp_hover")
            });
            n(a("td", j));
            a(".dp_previous", j).bind("click", function () {
                if (!a(this).hasClass("dp_blocked")) {
                    if (e == "months") {
                        G--
                    } else {
                        if (e == "years") {
                            G -= 12
                        } else {
                            if (--p < 0) {
                                p = 11;
                                G--
                            }
                        }
                    }
                    S()
                }
            });
            a(".dp_caption", j).bind("click", function () {
                if (e == "days") {
                    e = a.inArray("months", f) > -1 ? "months" : a.inArray("years", f) > -1 ? "years" : "days"
                } else {
                    if (e == "months") {
                        e = a.inArray("years", f) > -1 ? "years" : a.inArray("days", f) > -1 ? "days" : "months"
                    } else {
                        e = a.inArray("days", f) > -1 ? "days" : a.inArray("months", f) > -1 ? "months" : "years"
                    }
                }
                S()
            });
            a(".dp_next", j).bind("click", function () {
                if (!a(this).hasClass("dp_blocked")) {
                    if (e == "months") {
                        G++
                    } else {
                        if (e == "years") {
                            G += 12
                        } else {
                            if (++p == 12) {
                                p = 0;
                                G++
                            }
                        }
                    }
                    S()
                }
            });
            T.delegate("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_week_number)", "click", function () {
                if (ag.settings.select_other_months && null !== (ak = a(this).attr("class").match(/date\_([0-9]{4})(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])/))) {
                    m(ak[1], ak[2] - 1, ak[3], "days", a(this))
                } else {
                    m(G, p, r(a(this).html()), "days", a(this))
                }
            });
            b.delegate("td:not(.dp_disabled)", "click", function () {
                var aM = a(this).attr("class").match(/dp\_month\_([0-9]+)/);
                p = r(aM[1]);
                if (a.inArray("days", f) == -1) {
                    m(G, p, 1, "months", a(this))
                } else {
                    e = "days";
                    if (ag.settings.always_visible) {
                        i.val("")
                    }
                    S()
                }
            });
            q.delegate("td:not(.dp_disabled)", "click", function () {
                G = r(a(this).html());
                if (a.inArray("months", f) == -1) {
                    m(G, 1, 1, "years", a(this))
                } else {
                    e = "months";
                    if (ag.settings.always_visible) {
                        i.val("")
                    }
                    S()
                }
            });
            a(L).bind("click", function (aM) {
                aM.preventDefault();
                m(D, o, k, "days", a(".dp_current", T));
                if (ag.settings.always_visible) {
                    ag.show()
                }
                ag.hide()
            });
            a(Q).bind("click", function (aM) {
                aM.preventDefault();
                i.val("");
                if (!ag.settings.always_visible) {
                    J = null;
                    ac = null;
                    af = null;
                    p = null;
                    G = null
                } else {
                    J = null;
                    ac = null;
                    af = null;
                    a("td.dp_selected", N).removeClass("dp_selected")
                }
                ag.hide();
                if (ag.settings.onClear && typeof ag.settings.onClear == "function") {
                    ag.settings.onClear.call(i, i)
                }
            });
            if (!ag.settings.always_visible) {
                a(document).bind({
                    "mousedown.Zebra_DatePicker": function (aM) {
                        if (N.css("display") == "block") {
                            if (ag.settings.show_icon && a(aM.target).get(0) === w.get(0)) {
                                return true
                            }
                            if (a(aM.target).parents().filter(".Zebra_DatePicker").length === 0) {
                                ag.hide()
                            }
                        }
                    }, "keyup.Zebra_DatePicker": function (aM) {
                        if (N.css("display") == "block" && aM.which == 27) {
                            ag.hide()
                        }
                    }
                })
            }
            S()
        };
        ag.destroy = function () {
            if (undefined !== ag.icon) {
                ag.icon.remove()
            }
            ag.datepicker.remove();
            a(document).unbind("keyup.Zebra_DatePicker");
            a(document).unbind("mousedown.Zebra_DatePicker");
            a(window).unbind("resize.Zebra_DatePicker");
            i.removeData("Zebra_DatePicker")
        };
        ag.hide = function () {
            if (!ag.settings.always_visible) {
                P("hide");
                N.hide()
            }
        };
        ag.show = function () {
            e = ag.settings.view;
            var ak = l(i.val() || (ag.settings.start_date ? ag.settings.start_date : ""));
            if (ak) {
                ac = ak.getMonth();
                p = ak.getMonth();
                af = ak.getFullYear();
                G = ak.getFullYear();
                J = ak.getDate();
                if (Z(af, ac, J)) {
                    if (ag.settings.strict) {
                        i.val("")
                    }
                    p = A;
                    G = B
                }
            } else {
                p = A;
                G = B
            }
            S();
            if (!ag.settings.always_visible) {
                var ap = N.outerWidth(), ao = N.outerHeight(), an = (undefined !== w ? w.offset().left + w.outerWidth(true) : i.offset().left + i.outerWidth(true)) + ag.settings.offset[0], ar = (undefined !== w ? w.offset().top : i.offset().top) - ao + ag.settings.offset[1], am = a(window).width(), at = a(window).height(), al = a(window).scrollTop(), aq = a(window).scrollLeft();
                if (an + ap > aq + am) {
                    an = aq + am - ap
                }
                if (an < aq) {
                    an = aq
                }
                if (ar + ao > al + at) {
                    ar = al + at - ao
                }
                if (ar < al) {
                    ar = al
                }
                N.css({left: an, top: ar});
                N.fadeIn(g.name == "explorer" && g.version < 9 ? 0 : 150, "linear");
                P()
            } else {
                N.show()
            }
        };
        ag.update = function (ak) {
            if (ag.original_direction) {
                ag.original_direction = ag.direction
            }
            ag.settings = a.extend(ag.settings, ak);
            ad(true)
        };
        var l = function (ao) {
            ao += "";
            if (a.trim(ao) !== "") {
                var aA = H(ag.settings.format), az = ["d", "D", "j", "l", "N", "S", "w", "F", "m", "M", "n", "Y", "y"], at = [], ay = [], av = null, au = null;
                for (var ar = 0; ar < az.length; ar++) {
                    if ((av = aA.indexOf(az[ar])) > -1) {
                        at.push({character: az[ar], position: av})
                    }
                }
                at.sort(function (aD, aC) {
                    return aD.position - aC.position
                });
                a.each(at, function (aD, aC) {
                    switch (aC.character) {
                        case"d":
                            ay.push("0[1-9]|[12][0-9]|3[01]");
                            break;
                        case"D":
                            ay.push("[a-z]{3}");
                            break;
                        case"j":
                            ay.push("[1-9]|[12][0-9]|3[01]");
                            break;
                        case"l":
                            ay.push("[a-z]+");
                            break;
                        case"N":
                            ay.push("[1-7]");
                            break;
                        case"S":
                            ay.push("st|nd|rd|th");
                            break;
                        case"w":
                            ay.push("[0-6]");
                            break;
                        case"F":
                            ay.push("[a-z]+");
                            break;
                        case"m":
                            ay.push("0[1-9]|1[012]+");
                            break;
                        case"M":
                            ay.push("[a-z]{3}");
                            break;
                        case"n":
                            ay.push("[1-9]|1[012]");
                            break;
                        case"Y":
                            ay.push("[0-9]{4}");
                            break;
                        case"y":
                            ay.push("[0-9]{2}");
                            break
                    }
                });
                if (ay.length) {
                    at.reverse();
                    a.each(at, function (aD, aC) {
                        aA = aA.replace(aC.character, "(" + ay[ay.length - aD - 1] + ")")
                    });
                    ay = new RegExp("^" + aA + "$", "ig");
                    if (au = ay.exec(ao)) {
                        var aB = new Date(), am = aB.getDate(), al = aB.getMonth() + 1, ax = aB.getFullYear(), aw = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], aq = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], an, ak = true;
                        at.reverse();
                        a.each(at, function (aD, aC) {
                            if (!ak) {
                                return true
                            }
                            switch (aC.character) {
                                case"m":
                                case"n":
                                    al = r(au[aD + 1]);
                                    break;
                                case"d":
                                case"j":
                                    am = r(au[aD + 1]);
                                    break;
                                case"D":
                                case"l":
                                case"F":
                                case"M":
                                    if (aC.character == "D" || aC.character == "l") {
                                        an = ag.settings.days
                                    } else {
                                        an = ag.settings.months
                                    }
                                    ak = false;
                                    a.each(an, function (aE, aF) {
                                        if (ak) {
                                            return true
                                        }
                                        if (au[aD + 1].toLowerCase() == aF.substring(0, aC.character == "D" || aC.character == "M" ? 3 : aF.length).toLowerCase()) {
                                            switch (aC.character) {
                                                case"D":
                                                    au[aD + 1] = aw[aE].substring(0, 3);
                                                    break;
                                                case"l":
                                                    au[aD + 1] = aw[aE];
                                                    break;
                                                case"F":
                                                    au[aD + 1] = aq[aE];
                                                    al = aE + 1;
                                                    break;
                                                case"M":
                                                    au[aD + 1] = aq[aE].substring(0, 3);
                                                    al = aE + 1;
                                                    break
                                            }
                                            ak = true
                                        }
                                    });
                                    break;
                                case"Y":
                                    ax = r(au[aD + 1]);
                                    break;
                                case"y":
                                    ax = "19" + r(au[aD + 1]);
                                    break
                            }
                        });
                        if (ak) {
                            var ap = new Date(ax, (al || 1) - 1, am || 1);
                            if (ap.getFullYear() == ax && ap.getDate() == (am || 1) && ap.getMonth() == (al || 1) - 1) {
                                return ap
                            }
                        }
                    }
                }
                return false
            }
        };
        var n = function (ak) {
            if (g.name == "firefox") {
                ak.css("MozUserSelect", "none")
            } else {
                if (g.name == "explorer") {
                    ak.bind("selectstart", function () {
                        return false
                    })
                } else {
                    ak.mousedown(function () {
                        return false
                    })
                }
            }
        };
        var H = function (ak) {
            return ak.replace(/([-.,*+?^${}()|[\]\/\\])/g, "\\$1")
        };
        var M = function (al) {
            var au = "", ao = al.getDate(), at = al.getDay(), am = ag.settings.days[at], ak = al.getMonth() + 1, aq = ag.settings.months[ak - 1], ar = al.getFullYear() + "";
            for (var ap = 0; ap < ag.settings.format.length; ap++) {
                var an = ag.settings.format.charAt(ap);
                switch (an) {
                    case"y":
                        ar = ar.substr(2);
                    case"Y":
                        au += ar;
                        break;
                    case"m":
                        ak = y(ak, 2);
                    case"n":
                        au += ak;
                        break;
                    case"M":
                        aq = a.isArray(ag.settings.months_abbr) && undefined !== ag.settings.months_abbr[ak - 1] ? ag.settings.months_abbr[ak - 1] : ag.settings.months[ak - 1].substr(0, 3);
                    case"F":
                        au += aq;
                        break;
                    case"d":
                        ao = y(ao, 2);
                    case"j":
                        au += ao;
                        break;
                    case"D":
                        am = a.isArray(ag.settings.days_abbr) && undefined !== ag.settings.days_abbr[at] ? ag.settings.days_abbr[at] : ag.settings.days[at].substr(0, 3);
                    case"l":
                        au += am;
                        break;
                    case"N":
                        at++;
                    case"w":
                        au += at;
                        break;
                    case"S":
                        if (ao % 10 == 1 && ao != "11") {
                            au += "st"
                        } else {
                            if (ao % 10 == 2 && ao != "12") {
                                au += "nd"
                            } else {
                                if (ao % 10 == 3 && ao != "13") {
                                    au += "rd"
                                } else {
                                    au += "th"
                                }
                            }
                        }
                        break;
                    default:
                        au += an
                }
            }
            return au
        };
        var E = function () {
            var ao = new Date(G, p + 1, 0).getDate(), an = new Date(G, p, 1).getDay(), aq = new Date(G, p, 0).getDate(), am = an - ag.settings.first_day_of_week;
            am = am < 0 ? 7 + am : am;
            ai(ag.settings.header_captions.days);
            var ar = "<tr>";
            if (ag.settings.show_week_number) {
                ar += "<th>" + ag.settings.show_week_number + "</th>"
            }
            for (var ap = 0; ap < 7; ap++) {
                ar += "<th>" + (a.isArray(ag.settings.days_abbr) && undefined !== ag.settings.days_abbr[(ag.settings.first_day_of_week + ap) % 7] ? ag.settings.days_abbr[(ag.settings.first_day_of_week + ap) % 7] : ag.settings.days[(ag.settings.first_day_of_week + ap) % 7].substr(0, 2)) + "</th>"
            }
            ar += "</tr><tr>";
            for (ap = 0; ap < 42; ap++) {
                if (ap > 0 && ap % 7 === 0) {
                    ar += "</tr><tr>"
                }
                if (ap % 7 === 0 && ag.settings.show_week_number) {
                    ar += '<td class="dp_week_number">' + c(new Date(G, p, ap - am + 1)) + "</td>"
                }
                var aw = ap - am + 1;
                if (ag.settings.select_other_months && (ap < am || aw > ao)) {
                    var ax = new Date(G, p, aw), ak = ax.getFullYear(), at = ax.getMonth(), av = ax.getDate();
                    ax = ak + y(at + 1, 2) + y(av, 2)
                }
                if (ap < am) {
                    ar += '<td class="' + (ag.settings.select_other_months && !Z(ak, at, av) ? "dp_not_in_month_selectable date_" + ax : "dp_not_in_month") + '">' + (ag.settings.select_other_months || ag.settings.show_other_months ? y(aq - am + ap + 1, ag.settings.zero_pad ? 2 : 0) : "&nbsp;") + "</td>"
                } else {
                    if (aw > ao) {
                        ar += '<td class="' + (ag.settings.select_other_months && !Z(ak, at, av) ? "dp_not_in_month_selectable date_" + ax : "dp_not_in_month") + '">' + (ag.settings.select_other_months || ag.settings.show_other_months ? y(aw - ao, ag.settings.zero_pad ? 2 : 0) : "&nbsp;") + "</td>"
                    } else {
                        var au = (ag.settings.first_day_of_week + ap) % 7, al = "";
                        if (Z(G, p, aw)) {
                            if (a.inArray(au, ag.settings.weekend_days) > -1) {
                                al = "dp_weekend_disabled"
                            } else {
                                al += " dp_disabled"
                            }
                            if (p == o && G == D && k == aw) {
                                al += " dp_disabled_current"
                            }
                        } else {
                            if (a.inArray(au, ag.settings.weekend_days) > -1) {
                                al = "dp_weekend"
                            }
                            if (p == ac && G == af && J == aw) {
                                al += " dp_selected"
                            }
                            if (p == o && G == D && k == aw) {
                                al += " dp_current"
                            }
                        }
                        ar += "<td" + (al !== "" ? ' class="' + a.trim(al) + '"' : "") + ">" + (ag.settings.zero_pad ? y(aw, 2) : aw) + "</td>"
                    }
                }
            }
            ar += "</tr>";
            T.html(a(ar));
            if (ag.settings.always_visible) {
                U = a("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked, .dp_week_number)", T)
            }
            T.show()
        };
        var h = function () {
            ai(ag.settings.header_captions.months);
            var al = "<tr>";
            for (var ak = 0; ak < 12; ak++) {
                if (ak > 0 && ak % 3 === 0) {
                    al += "</tr><tr>"
                }
                var am = "dp_month_" + ak;
                if (Z(G, ak)) {
                    am += " dp_disabled"
                } else {
                    if (ac !== false && ac == ak && G == af) {
                        am += " dp_selected"
                    } else {
                        if (o == ak && D == G) {
                            am += " dp_current"
                        }
                    }
                }
                al += '<td class="' + a.trim(am) + '">' + (a.isArray(ag.settings.months_abbr) && undefined !== ag.settings.months_abbr[ak] ? ag.settings.months_abbr[ak] : ag.settings.months[ak].substr(0, 3)) + "</td>"
            }
            al += "</tr>";
            b.html(a(al));
            if (ag.settings.always_visible) {
                F = a("td:not(.dp_disabled)", b)
            }
            b.show()
        };
        var C = function () {
            ai(ag.settings.header_captions.years);
            var al = "<tr>";
            for (var ak = 0; ak < 12; ak++) {
                if (ak > 0 && ak % 3 === 0) {
                    al += "</tr><tr>"
                }
                var am = "";
                if (Z(G - 7 + ak)) {
                    am += " dp_disabled"
                } else {
                    if (af && af == G - 7 + ak) {
                        am += " dp_selected"
                    } else {
                        if (D == G - 7 + ak) {
                            am += " dp_current"
                        }
                    }
                }
                al += "<td" + (a.trim(am) !== "" ? ' class="' + a.trim(am) + '"' : "") + ">" + (G - 7 + ak) + "</td>"
            }
            al += "</tr>";
            q.html(a(al));
            if (ag.settings.always_visible) {
                R = a("td:not(.dp_disabled)", q)
            }
            q.show()
        };
        var P = function (ak) {
            if (g.name == "explorer" && g.version == 6) {
                if (!W) {
                    var am = r(N.css("zIndex")) - 1;
                    W = jQuery("<iframe>", {
                        src: 'javascript:document.write("")',
                        scrolling: "no",
                        frameborder: 0,
                        allowtransparency: "true",
                        css: {
                            zIndex: am,
                            position: "absolute",
                            top: -1000,
                            left: -1000,
                            width: N.outerWidth(),
                            height: N.outerHeight(),
                            filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=0)",
                            display: "none"
                        }
                    });
                    a("body").append(W)
                }
                switch (ak) {
                    case"hide":
                        W.hide();
                        break;
                    default:
                        var al = N.offset();
                        W.css({top: al.top, left: al.left, display: "block"})
                }
            }
        };
        var Z = function (ap, aq, al) {
            if ((undefined === ap || isNaN(ap)) && (undefined === aq || isNaN(aq)) && (undefined === al || isNaN(al))) {
                return false
            }
            if (!(!a.isArray(ag.settings.direction) && r(ag.settings.direction) === 0)) {
                var an = r(aj(ap, typeof aq != "undefined" ? y(aq, 2) : "", typeof al != "undefined" ? y(al, 2) : "")), ak = (an + "").length;
                if (ak == 8 && (typeof ah != "undefined" && an < r(aj(B, y(A, 2), y(Y, 2))) || typeof V != "undefined" && an > r(aj(d, y(t, 2), y(I, 2))))) {
                    return true
                } else {
                    if (ak == 6 && (typeof ah != "undefined" && an < r(aj(B, y(A, 2))) || typeof V != "undefined" && an > r(aj(d, y(t, 2))))) {
                        return true
                    } else {
                        if (ak == 4 && (typeof ah != "undefined" && an < B || typeof V != "undefined" && an > d)) {
                            return true
                        }
                    }
                }
            }
            if (typeof aq != "undefined") {
                aq = aq + 1
            }
            var ao = false, am = false;
            if (v) {
                a.each(v, function () {
                    if (ao) {
                        return
                    }
                    var at = this;
                    if (a.inArray(ap, at[2]) > -1 || a.inArray("*", at[2]) > -1) {
                        if (typeof aq != "undefined" && a.inArray(aq, at[1]) > -1 || a.inArray("*", at[1]) > -1) {
                            if (typeof al != "undefined" && a.inArray(al, at[0]) > -1 || a.inArray("*", at[0]) > -1) {
                                if (at[3] == "*") {
                                    return ao = true
                                }
                                var ar = new Date(ap, aq - 1, al).getDay();
                                if (a.inArray(ar, at[3]) > -1) {
                                    return ao = true
                                }
                            }
                        }
                    }
                })
            }
            if (aa) {
                a.each(aa, function () {
                    if (am) {
                        return
                    }
                    var at = this;
                    if (a.inArray(ap, at[2]) > -1 || a.inArray("*", at[2]) > -1) {
                        am = true;
                        if (typeof aq != "undefined") {
                            am = true;
                            if (a.inArray(aq, at[1]) > -1 || a.inArray("*", at[1]) > -1) {
                                if (typeof al != "undefined") {
                                    am = true;
                                    if (a.inArray(al, at[0]) > -1 || a.inArray("*", at[0]) > -1) {
                                        if (at[3] == "*") {
                                            return am = true
                                        }
                                        var ar = new Date(ap, aq - 1, al).getDay();
                                        if (a.inArray(ar, at[3]) > -1) {
                                            return am = true
                                        }
                                        am = false
                                    } else {
                                        am = false
                                    }
                                }
                            } else {
                                am = false
                            }
                        }
                    }
                })
            }
            if (aa && am) {
                return false
            } else {
                if (v && ao) {
                    return true
                }
            }
            return false
        };
        var ae = function (ak) {
            return (ak + "").match(/^\-?[0-9]+$/) ? true : false
        };
        var ai = function (ak) {
            if (a.isNumeric(p)) {
                ak = ak.replace(/\bm\b/, y(p + 1, 2)).replace(/\bn\b/, p + 1).replace(/\bF\b/, ag.settings.months[p]).replace(/\bM\b/, a.isArray(ag.settings.months_abbr) && undefined !== ag.settings.months_abbr[p] ? ag.settings.months_abbr[p] : ag.settings.months[p].substr(0, 3))
            }
            if (a.isNumeric(G)) {
                ak = ak.replace(/\bY\b/, G).replace(/\by\b/, (G + "").substr(2)).replace(/\bY1\b/i, G - 7).replace(/\bY2\b/i, G + 4) + "<em></em>"
            }
            ;
            a(".dp_caption", j).html(ak);
            if (!(!a.isArray(ag.settings.direction) && r(ag.settings.direction) === 0) || f.length == 1 && f[0] == "months") {
                var am = G, ao = p, al, an;
                if (e == "days") {
                    an = !Z(ao - 1 < 0 ? aj(am - 1, "11") : aj(am, y(ao - 1, 2)));
                    al = !Z(ao + 1 > 11 ? aj(am + 1, "00") : aj(am, y(ao + 1, 2)))
                } else {
                    if (e == "months") {
                        if (!ah || ah.getFullYear() <= am - 1) {
                            an = true
                        }
                        if (!V || V.getFullYear() >= am + 1) {
                            al = true
                        }
                    } else {
                        if (e == "years") {
                            if (!ah || ah.getFullYear() < am - 7) {
                                an = true
                            }
                            if (!V || V.getFullYear() > am + 4) {
                                al = true
                            }
                        }
                    }
                }
                if (!an) {
                    a(".dp_previous", j).addClass("dp_blocked");
                    a(".dp_previous", j).removeClass("dp_hover")
                } else {
                    a(".dp_previous", j).removeClass("dp_blocked")
                }
                if (!al) {
                    a(".dp_next", j).addClass("dp_blocked");
                    a(".dp_next", j).removeClass("dp_hover")
                } else {
                    a(".dp_next", j).removeClass("dp_blocked")
                }
            }
        };
        var S = function () {
            if (T.text() === "" || e == "days") {
                if (T.text() === "") {
                    if (!ag.settings.always_visible) {
                        N.css("left", -1000)
                    }
                    N.show();
                    E();
                    var al = T.outerWidth(), ak = T.outerHeight();
                    b.css({width: al, height: ak});
                    q.css({width: al, height: ak});
                    j.css("width", al);
                    s.css("width", al);
                    N.hide()
                } else {
                    E()
                }
                b.hide();
                q.hide()
            } else {
                if (e == "months") {
                    h();
                    T.hide();
                    q.hide()
                } else {
                    if (e == "years") {
                        C();
                        T.hide();
                        b.hide()
                    }
                }
            }
            if (ag.settings.onChange && typeof ag.settings.onChange == "function" && undefined !== e) {
                var am = e == "days" ? T.find("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked)") : e == "months" ? b.find("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked)") : q.find("td:not(.dp_disabled, .dp_weekend_disabled, .dp_not_in_month, .dp_blocked)");
                am.each(function () {
                    if (e == "days") {
                        if (a(this).hasClass("dp_not_in_month_selectable")) {
                            var an = a(this).attr("class").match(/date\_([0-9]{4})(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])/);
                            a(this).data("date", an[1] + "-" + an[2] + "-" + an[3])
                        } else {
                            a(this).data("date", G + "-" + y(p + 1, 2) + "-" + y(r(a(this).text()), 2))
                        }
                    } else {
                        if (e == "months") {
                            var an = a(this).attr("class").match(/dp\_month\_([0-9]+)/);
                            a(this).data("date", G + "-" + y(r(an[1]) + 1, 2))
                        } else {
                            a(this).data("date", r(a(this).text()))
                        }
                    }
                });
                ag.settings.onChange.call(i, e, am, i)
            }
            s.show();
            if (ag.settings.show_clear_date === true || ag.settings.show_clear_date === 0 && i.val() !== "" || ag.settings.always_visible && ag.settings.show_clear_date !== false) {
                Q.show();
                if (X) {
                    L.css("width", "50%");
                    Q.css("width", "50%")
                } else {
                    L.hide();
                    Q.css("width", "100%")
                }
            } else {
                Q.hide();
                if (X) {
                    L.show().css("width", "100%")
                } else {
                    s.hide()
                }
            }
        };
        var m = function (aq, ar, ao, am, al) {
            var ak = new Date(aq, ar, ao, 12, 0, 0), an = am == "days" ? U : am == "months" ? F : R, ap = M(ak);
            i.val(ap);
            if (ag.settings.always_visible) {
                ac = ak.getMonth();
                p = ak.getMonth();
                af = ak.getFullYear();
                G = ak.getFullYear();
                J = ak.getDate();
                an.removeClass("dp_selected");
                al.addClass("dp_selected");
                if (am == "days" && al.hasClass("dp_not_in_month_selectable")) {
                    ag.show()
                }
            }
            ag.hide();
            u(ak);
            if (ag.settings.onSelect && typeof ag.settings.onSelect == "function") {
                ag.settings.onSelect.call(i, ap, aq + "-" + y(ar + 1, 2) + "-" + y(ao, 2), ak, i)
            }
            i.focus()
        };
        var aj = function () {
            var al = "";
            for (var ak = 0; ak < arguments.length; ak++) {
                al += arguments[ak] + ""
            }
            return al
        };
        var y = function (al, ak) {
            al += "";
            while (al.length < ak) {
                al = "0" + al
            }
            return al
        };
        var r = function (ak) {
            return parseInt(ak, 10)
        };
        var u = function (ak) {
            if (ag.settings.pair) {
                a.each(ag.settings.pair, function () {
                    var al = a(this);
                    if (!(al.data && al.data("Zebra_DatePicker"))) {
                        al.data("zdp_reference_date", ak)
                    } else {
                        var am = al.data("Zebra_DatePicker");
                        am.update({
                            reference_date: ak,
                            direction: am.settings.direction === 0 ? 1 : am.settings.direction
                        });
                        if (am.settings.always_visible) {
                            am.show()
                        }
                    }
                })
            }
        };
        var c = function (al) {
            var at = al.getFullYear(), am = al.getMonth() + 1, aq = al.getDate(), av, au, ar, ax, ap, ao, an, ak, aw;
            if (am < 3) {
                av = at - 1;
                au = (av / 4 | 0) - (av / 100 | 0) + (av / 400 | 0);
                ar = ((av - 1) / 4 | 0) - ((av - 1) / 100 | 0) + ((av - 1) / 400 | 0);
                ax = au - ar;
                ap = 0;
                ao = aq - 1 + 31 * (am - 1)
            } else {
                av = at;
                au = (av / 4 | 0) - (av / 100 | 0) + (av / 400 | 0);
                ar = ((av - 1) / 4 | 0) - ((av - 1) / 100 | 0) + ((av - 1) / 400 | 0);
                ax = au - ar;
                ap = ax + 1;
                ao = aq + ((153 * (am - 3) + 2) / 5 | 0) + 58 + ax
            }
            an = (av + au) % 7;
            aq = (ao + an - ap) % 7;
            ak = ao + 3 - aq;
            if (ak < 0) {
                aw = 53 - ((an - ax) / 5 | 0)
            } else {
                if (ak > 364 + ax) {
                    aw = 1
                } else {
                    aw = (ak / 7 | 0) + 1
                }
            }
            return aw
        };
        var g = {
            init: function () {
                this.name = this.searchString(this.dataBrowser) || "";
                this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || ""
            },
            searchString: function (an) {
                for (var ak = 0; ak < an.length; ak++) {
                    var al = an[ak].string;
                    var am = an[ak].prop;
                    this.versionSearchString = an[ak].versionSearch || an[ak].identity;
                    if (al) {
                        if (al.indexOf(an[ak].subString) != -1) {
                            return an[ak].identity
                        }
                    } else {
                        if (am) {
                            return an[ak].identity
                        }
                    }
                }
            },
            searchVersion: function (al) {
                var ak = al.indexOf(this.versionSearchString);
                if (ak == -1) {
                    return
                }
                return parseFloat(al.substring(ak + this.versionSearchString.length + 1))
            },
            dataBrowser: [{
                string: navigator.userAgent,
                subString: "Firefox",
                identity: "firefox"
            }, {string: navigator.userAgent, subString: "MSIE", identity: "explorer", versionSearch: "MSIE"}]
        };
        g.init();
        ad()
    };
    a.fn.DatePicker = function (b) {
        return this.each(function () {
            if (undefined !== a(this).data("Zebra_DatePicker")) {
                a(this).data("Zebra_DatePicker").destroy()
            }
            var c = new a.DatePicker(this, b);
            a(this).data("Zebra_DatePicker", c)
        })
    }
})(jQuery);
