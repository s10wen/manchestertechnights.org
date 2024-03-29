<?php
$token = md5(uniqid(rand(), true));
setcookie('csrftoken', $token, 0, '/');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Manchester Tech Nights</title>
    <meta name="description" content="Manchester Tech Nights is a get together for the Manchester's technical community to get together, share best practice and find out about we're all getting up to">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <meta name="viewport" content="width=device-width">
</head>
<body data-csrf-token="<?php echo htmlspecialchars($token); ?>">
<section class="mailing-list-banner">
    <p aria-live="polite">
        We want to make sure you know about the upcoming Tech Nights, and don't miss out on any interesting speakers
        or last minute changes - even if you don't follow us on Twitter. So sign up to our mailing list to receive
        information about future Manchester Tech Nights!
    </p>
    <form action="/mlsignup.php" method="post">
        <label for="email">E-mail</label><input type="email" name="email" id="email" placeholder="your@awesome.email.address" required="true">
        <input type="submit" value="Join our mailing list">
    </form>
</section>
<article itemscope itemtype="http://schema.org/Event">
    <header>
        <h1 itemprop="name">Manchester Tech Nights #5</h1>
        <p><a href="https://twitter.com/mcrtechnights" class="twitter-follow-button">Follow @mcrtechnights</a></p>
        <h2><meta itemprop="startDate" content="2014-10-09T19:00:00Z">Thursday 9th October 2014, 7pm</h2>
        <h2 itemprop="location" itemscope itemtype="http://schema.org/Place">
            <a href="http://spaceportx.com/" itemprop="url">
                <span itemprop="name">Spaceport</span> (ex-TechHub Manchester)
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="streetAddress">26 Lever Street</span>,
                    <span itemprop="addressLocality">Manchester</span>,
                    <span itemprop="postalCode">M1 1DW</span>
                </span>
            </a>
        </h2>
        <p itemprop="description">
            Manchester Tech Nights is a meetup aimed at Manchester's technology community, either the people who are
            making Manchester's tech scene what it is, or just those who are interested and want to keep up-to-date.
            We want to find out what's going on across the north west, regardless of language. The night kicks off with
            a headline talk, followed by a series of shorter lightning talks and then an informal chat between attendees.
        </p>
        <p><a href="http://lanyrd.com/2014/manchester-tech-nights-5/">Attend on Lanyrd</a></p>
        <p class="sponsor">Manchester Tech Nights would like to thank <a href="http://www.melbourne.co.uk/">Melbourne Server Hosting</a> for sponsoring our fifth event!</p>
    </header>
    <section>
        <h1>Headline Speakers</h1>
        <div itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
            <h2 itemprop="name">Hello PlayStation!</h2>
            <p itemprop="description">
                <em itemprop="performer" itemscope itemtype="http://schema.org/Person"><span itemprop="name">Dr Maria Stukoff</span></em>
            </p>
        </div>
    </section>
    <section>
        <h1>Lightning Talks</h1>
        <div itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
            <h2 itemprop="name">Why Mentors Matter</h2>
            <p itemprop="performer" itemscope itemtype="http://schema.org/Person"><span itemprop="name">Vimla Appadoo</span></p>
        </div>
        <div itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
            <h2 itemprop="name">Secure and Managed File Transfer</h2>
            <p itemprop="performer" itemscope itemtype="http://schema.org/Person"><span itemprop="name">Pradeep Hallikeri</span></p>
        </div>
        <div itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
            <h2 itemprop="name">Advergames</h2>
            <p itemprop="performer" itemscope itemtype="http://schema.org/Person"><span itemprop="name">Simon Smith</span></p>
        </div>
        <div itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
            <h2 itemprop="name">You?</h2>
            <p itemprop="description">
                There are 5 minute 'lightning' and 30 second 'elevator' slots available on the night for anyone
                who wants to talk, just speak to an organiser on the night for the elevator slots, or
                <a href="mailto:hello@manchestertechnights.org">contact us</a> about the lightning slots.
            </p>
        </div>
    </section>
</article>
<nav>
    <h2>Previous Tech Nights</h2>
    <ol>
        <li><a href="/4/">#4 - Applied Reactive Manifesto</a>
        <li><a href="/3/">#3 - Will tackling the testosterone lure more ladies into tech?</a></li>
        <li><a href="/2/">#2 - Open Source in the Enterprise</a></li>
        <li><a href="/1/">#1 - Disregard rulebook, make videogames!</a></li>
    </ol>
</nav>
<footer>
    <p>
        Manchester Tech Nights is organised by <a href="mailto:michael@manchestertechnights.org">Michael Hall</a>
        (<a href="https://twitter.com/mikehallhn">@mikehallhn</a>) and <a href="mailto:chris@pling.org.uk">Chris Northwood</a>
        (<a href="https://twitter.com/cnorthwood">@cnorthwood</a>) and is dedicated to being an inclusive
        night with a welcoming atmosphere for everyone - please see our <a href="/code-of-conduct/">code of conduct</a>.
        If you have any concerns, please contact the organisers on the night or at the e-mail addresses above, and
        they will be dealt with in confidence and appropriately.
    </p>
</footer>
<script src="/js/mlsignup.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
