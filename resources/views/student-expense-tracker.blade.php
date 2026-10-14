<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f8f4">
    <title>Student Expense Tracker</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #17221d;
            background: #f7f8f4;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            overflow-x: clip;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page {
            width: min(1120px, calc(100% - 48px));
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            min-height: 88px;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            font-weight: 750;
            letter-spacing: -0.03em;
        }

        .brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 13px;
            background: #176b4d;
            color: white;
            font-size: 20px;
        }

        .top-link {
            color: #55645b;
            font-size: 14px;
            font-weight: 650;
        }

        .hero {
            display: grid;
            min-height: 620px;
            grid-template-columns: 1fr 0.9fr;
            align-items: center;
            gap: 72px;
            padding: 48px 0 84px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dce7df;
            border-radius: 999px;
            background: #fff;
            color: #176b4d;
            font-size: 12px;
            font-weight: 750;
            letter-spacing: 0.08em;
            padding: 9px 12px;
            text-transform: uppercase;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #28a06f;
        }

        h1 {
            max-width: 620px;
            margin: 24px 0 18px;
            font-size: clamp(44px, 6vw, 70px);
            line-height: 1.04;
            letter-spacing: -0.065em;
        }

        h1 span {
            color: #176b4d;
        }

        .intro {
            max-width: 490px;
            margin: 0;
            color: #65736a;
            font-size: 17px;
            line-height: 1.75;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 18px;
            margin-top: 32px;
        }

        .button {
            display: inline-flex;
            min-height: 48px;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #176b4d;
            color: white;
            font-size: 14px;
            font-weight: 700;
            padding: 0 20px;
            transition: background 150ms ease, transform 150ms ease;
        }

        .button:hover {
            transform: translateY(-1px);
            background: #10563d;
        }

        .note {
            color: #748078;
            font-size: 13px;
        }

        .preview-wrap {
            position: relative;
        }

        .preview-wrap::before {
            position: absolute;
            z-index: -1;
            top: 12%;
            right: -9%;
            width: 88%;
            height: 88%;
            border-radius: 32px;
            background: #e3eee6;
            content: "";
            transform: rotate(5deg);
        }

        .preview {
            border: 1px solid #e8ece7;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 24px 70px rgb(29 55 40 / 10%);
            padding: 26px;
        }

        .preview-heading,
        .budget-row,
        .category,
        .preview-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .preview-heading {
            margin-bottom: 24px;
        }

        .preview-title {
            margin: 0;
            font-size: 15px;
            font-weight: 750;
        }

        .period {
            border-radius: 8px;
            background: #f2f5f1;
            color: #57665c;
            font-size: 11px;
            font-weight: 650;
            padding: 8px 10px;
        }

        .balance {
            border-radius: 17px;
            background: #176b4d;
            color: white;
            padding: 22px;
        }

        .balance-label {
            color: #d2e8dc;
            font-size: 12px;
        }

        .balance-value {
            display: block;
            margin-top: 9px;
            font-size: 34px;
            font-weight: 750;
            letter-spacing: -0.05em;
        }

        .budget-row {
            margin: 24px 0 12px;
            color: #56645b;
            font-size: 12px;
        }

        .budget-row strong {
            color: #17221d;
        }

        .progress {
            height: 8px;
            overflow: hidden;
            border-radius: 99px;
            background: #e9eee9;
        }

        .progress span {
            display: block;
            width: 62%;
            height: 100%;
            border-radius: inherit;
            background: #71bd91;
        }

        .section-label {
            margin: 26px 0 14px;
            color: #79847d;
            font-size: 11px;
            font-weight: 750;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .categories {
            display: grid;
            gap: 14px;
        }

        .category {
            font-size: 12px;
        }

        .category-name {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #4e5c53;
        }

        .category-icon {
            display: grid;
            width: 32px;
            height: 32px;
            place-items: center;
            border-radius: 10px;
            background: #f1f6f1;
            font-size: 15px;
        }

        .category strong {
            color: #25332a;
            font-size: 12px;
        }

        .preview-footer {
            margin-top: 22px;
            border-top: 1px solid #edf0ec;
            padding-top: 16px;
            color: #78837b;
            font-size: 11px;
        }

        .preview-footer strong {
            color: #176b4d;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            border-top: 1px solid #e6eae4;
            padding: 32px 0 48px;
        }

        .feature {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #66736a;
            font-size: 13px;
            line-height: 1.6;
        }

        .feature-icon {
            display: grid;
            width: 34px;
            height: 34px;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 11px;
            background: #e8f1e9;
            color: #176b4d;
            font-size: 15px;
        }

        .feature strong {
            display: block;
            margin-bottom: 3px;
            color: #26332a;
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 36px, 520px);
            }

            .topbar {
                min-height: 72px;
            }

            .hero {
                min-height: auto;
                grid-template-columns: 1fr;
                gap: 48px;
                padding: 48px 0 60px;
            }

            h1 {
                font-size: clamp(44px, 12vw, 60px);
            }

            .preview {
                padding: 20px;
            }

            .preview-wrap::before {
                display: none;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    <header class="page topbar">
        <a class="brand" href="/" aria-label="Student Expense Tracker home">
            <span class="brand-mark" aria-hidden="true">↗</span>
            <span>Student Expense Tracker</span>
        </a>
        <a class="top-link" href="#features">Made for student life</a>
    </header>

    <main>
        <section class="page hero" aria-labelledby="hero-title">
            <div>
                <span class="eyebrow"><span class="eyebrow-dot" aria-hidden="true"></span> Your money, in focus</span>
                <h1 id="hero-title">Make your money work <span>smarter.</span></h1>
                <p class="intro">
                    Keep tabs on everyday spending, plan around your budget, and feel more in control of student life.
                </p>
                <div class="actions">
                    <a class="button" href="#features">See how it works <span aria-hidden="true">&nbsp;→</span></a>
                    <span class="note">A clearer view of your spending starts here.</span>
                </div>
            </div>

            <div class="preview-wrap" aria-label="Example expense dashboard preview">
                <section class="preview">
                    <div class="preview-heading">
                        <h2 class="preview-title">Monthly overview</h2>
                        <span class="period">Sample preview</span>
                    </div>
                    <div class="balance">
                        <span class="balance-label">Budget remaining</span>
                        <strong class="balance-value">$420.50</strong>
                    </div>
                    <div class="budget-row">
                        <span>Monthly budget</span>
                        <strong>$1,100.00</strong>
                    </div>
                    <div class="progress" role="img" aria-label="62 percent of the sample budget used"><span></span></div>
                    <p class="section-label">Spending snapshot</p>
                    <div class="categories">
                        <div class="category">
                            <span class="category-name"><span class="category-icon" aria-hidden="true">🍜</span>Food &amp; coffee</span>
                            <strong>$286.40</strong>
                        </div>
                        <div class="category">
                            <span class="category-name"><span class="category-icon" aria-hidden="true">📚</span>Books &amp; supplies</span>
                            <strong>$154.10</strong>
                        </div>
                        <div class="category">
                            <span class="category-name"><span class="category-icon" aria-hidden="true">🚌</span>Transport</span>
                            <strong>$92.00</strong>
                        </div>
                    </div>
                    <div class="preview-footer">
                        <span>Example figures for illustration</span>
                        <strong>Stay on track</strong>
                    </div>
                </section>
            </div>
        </section>

        <section class="page features" id="features" aria-label="What you can do">
            <div class="feature">
                <span class="feature-icon" aria-hidden="true">◎</span>
                <span><strong>Know where it goes</strong>See everyday expenses at a glance.</span>
            </div>
            <div class="feature">
                <span class="feature-icon" aria-hidden="true">⌁</span>
                <span><strong>Plan your budget</strong>Keep spending goals simple and clear.</span>
            </div>
            <div class="feature">
                <span class="feature-icon" aria-hidden="true">✓</span>
                <span><strong>Feel more in control</strong>Build better money habits, one day at a time.</span>
            </div>
        </section>
    </main>
</body>
</html>
