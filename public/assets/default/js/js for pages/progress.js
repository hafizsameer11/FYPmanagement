
const students = {
    'Shakeel Abbas': {
        studentID: 'BSCS-023R20-37',
        projectTitle: 'E supervision Management System',
        projectSupervisor: 'Sir Zia Rehman Zia',
        progress: [
            {
                weekStartDate: '2024-02-26',
                weekEndDate: '2024-03-03',
                progressDescription: 'Reviewed the current supervision system. Conducted a review of possible literature on the supervision system. Created a comparison table of systems based on the following criteria: Functionality/Features.',
                researchAndDevelopment: 'IP',
                coding: 'IP',
                documentation: 'C',
                comments: 'John demonstrated strong research skills and a clear understanding of the project requirements. His coding progress is on track and he plans to continue working on the front-end interface in the next week.',
                challenges: 'John encountered some minor issues with CSS styles but he is actively troubleshooting them. He may benefit from additional mentoring in advanced front-end development techniques.',
                supervisorSignature: '',
                date: '2024-03-03'
            },
            // Add more weekly progress here...
        ]
    },
    'M Ahsan Nafees': {
        studentID: 'BSCS-023R20-42',
        projectTitle: 'E supervision Management System',
        projectSupervisor: 'Sir Zia Rehman Zia',
        progress: [
            {
                weekStartDate: '2024-02-26',
                weekEndDate: '2024-03-03',
                progressDescription: 'Reviewed the current supervision system. Conducted a review of possible literature on the supervision system. Created a comparison table of systems based on the following criteria: Functionality/Features.',
                researchAndDevelopment: 'IP',
                coding: 'IP',
                documentation: 'C',
                comments: 'Ahsan demonstrated strong research skills and a clear understanding of the project requirements. His coding progress is on track and he plans to continue working on the front-end interface in the next week.',
                challenges: 'Ahsan encountered some minor issues with CSS styles but he is actively troubleshooting them. He may benefit from additional mentoring in advanced front-end development techniques.',
                supervisorSignature: '',
                date: '2024-03-03'
            },
            {
                weekStartDate: '2024-03-04',
                weekEndDate: '2024-03-10',
                progressDescription: 'Created diagrams for the current system including Use Case Diagrams, Activity Diagram, Sequence Diagram, Data Flow Diagrams (DFDs), and ER Diagram.',
                researchAndDevelopment: 'C',
                coding: 'IP',
                documentation: 'IP',
                comments: 'Ahsan created diagrams to understand the data of the current system. However, full understanding of the system information was not achieved.',
                challenges: 'Continued challenges with understanding the current system. Further consultations needed.',
                supervisorSignature: '',
                date: '2024-03-10'
            }
        ]
    }
};

function viewProgress() {
    const studentName = document.getElementById('studentNameSelect').value;
    const student = students[studentName];

    if (student) {
        document.getElementById('studentName').value = studentName;
        document.getElementById('studentID').value = student.studentID;
        document.getElementById('projectTitle').value = student.projectTitle;
        document.getElementById('projectSupervisor').value = student.projectSupervisor;

        const weekButtons = document.getElementById('weekButtons');
        weekButtons.innerHTML = '';

        student.progress.forEach((week, index) => {
            const button = document.createElement('button');
            button.className = 'btn btn-secondary mr-2';
            button.textContent = `Week ${index + 1}`;
            button.onclick = () => showWeekDetails(student, index);
            weekButtons.appendChild(button);
        });

        document.getElementById('weekButtons').style.display = 'block';
        document.getElementById('progressReportForm').style.display = 'none';
    }
}

function showWeekDetails(student, weekIndex) {
    const week = student.progress[weekIndex];

    document.getElementById('weekStartDate').value = week.weekStartDate;
    document.getElementById('weekEndDate').value = week.weekEndDate;
    document.getElementById('progressDescription').value = week.progressDescription;
    document.getElementById('researchAndDevelopment').value = week.researchAndDevelopment;
    document.getElementById('coding').value = week.coding;
    document.getElementById('documentation').value = week.documentation;
    document.getElementById('comments').value = week.comments;
    document.getElementById('challenges').value = week.challenges;
    document.getElementById('supervisorSignature').value = week.supervisorSignature;
    document.getElementById('date').value = week.date;

    document.getElementById('progressReportForm').style.display = 'block';
}
