<?php
$gradingSystem = array(
    'A+' => 4.00,
    'A' => 3.75,
    'A-' => 3.50,
    'B+' => 3.25,
    'B' => 3.00,
    'B-' => 2.75,
    'C+' => 2.50,
    'C' => 2.25,
    'D' => 2.00,
    'F' => 0.00
);

$courseDetails = array(
    array('course_code' => 'CSE-2201', 'credit_hours' => 3),
    array('course_code' => 'CSE-2202', 'credit_hours' => 1.5),
    array('course_code' => 'CSE-2203', 'credit_hours' => 3),
    array('course_code' => 'CSE-2205', 'credit_hours' => 3),
    array('course_code' => 'CSE-2207', 'credit_hours' => 3),
    array('course_code' => 'CSE-2208', 'credit_hours' => 1.5),
    array('course_code' => 'CSE-2210', 'credit_hours' => 3),
    array('course_code' => 'MATH-2211', 'credit_hours' => 3)
);

$marksArray = array(
    array('course_code' => 'CSE-2201', 'mark' => 60),
    array('course_code' => 'CSE-2202', 'mark' => 70),
    array('course_code' => 'CSE-2203', 'mark' => 80),
    array('course_code' => 'CSE-2205', 'mark' => 85),
    array('course_code' => 'CSE-2207', 'mark' => 75),
    array('course_code' => 'CSE-2208', 'mark' => 65),
    array('course_code' => 'CSE-2210', 'mark' => 90),
    array('course_code' => 'MATH-2211', 'mark' => 72)
);

function calculateCGPA($marksArray, $gradingSystem, $courseDetails)
{
    $totalWeightedGradePoints = 0;
    $totalCreditHours = 0;

    foreach ($marksArray as $marks) {
        $mark = $marks['mark'];
        $course_code = $marks['course_code'];

        foreach ($gradingSystem as $grade => $gradePoint) {
            if ($mark >= $gradePoint) {
                break;
            }
        }

        $creditHours = 0;
        foreach ($courseDetails as $course) {
            if ($course['course_code'] === $course_code) {
                $creditHours = $course['credit_hours'];
                break;
            }
        }

        $weightedGradePoints = $gradePoint * $creditHours;

        $totalWeightedGradePoints += $weightedGradePoints;
        $totalCreditHours += $creditHours;
    }

    $cgpa = $totalWeightedGradePoints / $totalCreditHours;

    return $cgpa;
}

$cgpa = calculateCGPA($marksArray, $gradingSystem, $courseDetails);

echo "CGPA: " . number_format($cgpa, 2);
?>