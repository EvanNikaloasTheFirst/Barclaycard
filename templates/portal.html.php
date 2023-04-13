<?php foreach($stmt as $job) { ?>

    <blockquote>
        <p>

       <?= '<a  href = "/staff/view?urn='. $job['urn'].'"><li>'.nl2br($job['urn']).'</li></a>'; ?>
<!-- job/jobs?categoryId=1 -->
        </p>

    </blockquote>
<?php } ?>
