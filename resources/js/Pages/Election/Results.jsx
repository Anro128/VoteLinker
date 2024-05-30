import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';
import {
    Card,
    CardBody,
    CardHeader,
    Typography,
} from "@material-tailwind/react";
import Chart from "react-apexcharts";
import { Square3Stack3DIcon } from "@heroicons/react/24/outline";


export default function index({ auth, election, candidates, arrRes, noUrut, color }) {
    const chartConfigBar = {
        type: "bar",
        height: 240,
        series: [
            {
                name: "Sales",
                data: arrRes,
            },
        ],
        options: {
            chart: {
                toolbar: {
                    show: false,
                },
            },
            title: {
                show: "",
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#020617"],
            plotOptions: {
                bar: {
                    columnWidth: "40%",
                    borderRadius: 2,
            },
            },
            xaxis: {
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "12px",
                        fontFamily: "inherit",
                        fontWeight: 400,
                    },
                },
                categories: noUrut
            },
            yaxis: {
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "12px",
                        fontFamily: "inherit",
                        fontWeight: 400,
                    },
                },
            },
            grid: {
                show: true,
                borderColor: "#dddddd",
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 5,
                    right: 20,
                },
            },
            fill: {
                opacity: 0.8,
            },
            tooltip: {
                theme: "dark",
            },
        },
    };
    
    const chartConfigPie = {
        type: "pie",
        width: 280,
        height: 280,
        series: arrRes,
        options: {
            chart: {
                toolbar: {
                    show: false,
                },
            },
            title: {
                show: "",
            },
            dataLabels: {
                enabled: false,
            },
            colors: color,
            legend: {
                show: false,
            },
        },
    };
    
    return (
        <AuthenticatedLayout user={auth.user}>
        <Head title="Election" />

        <div className="py-12">
            <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div className='bg-[#282D56] p-4 w-full flex justify-center items-center rounded-t-lg'>
                    <h1 className='text-white text-4xl font-extrabold'>Results {election.Title}</h1>
                </div>
                <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[70vh] w-full p-4 flex flex-col lg:flex-row gap-4">
                    <div className="w-full lg:w-1/2">
                        <ul className="space-y-4">
                            {candidates.map((candidate) => (
                                <li key={candidate.id} className='bg-white border border-gray-300 shadow-lg rounded-lg p-6 flex gap-4 items-center'>
                                    {candidate.Photo && (
                                        <div className="flex-shrink-0">
                                            <img
                                                src={`/storage/${candidate.Photo}`} 
                                                alt={`${candidate.Chairman}`} 
                                                className="w-24 h-24 object-cover rounded-full border border-gray-300"
                                            />
                                        </div>
                                    )}
                                    <div className="flex flex-col justify-between w-full">
                                        <div className="text-gray-600 text-sm">Serial Number:</div>
                                        <div className="text-xl font-bold text-gray-800">{candidate.SerialNumber}</div>
                                        <div className="text-gray-600 text-sm mt-2">Chairman:</div>
                                        <div className="text-xl font-bold text-gray-800">{candidate.Chairman}</div>
                                        <div className="text-gray-600 text-sm mt-2">Deputy Chairman:</div>
                                        <div className="text-lg text-gray-700">{candidate.DeputyChairman}</div>
                                        <div className="text-gray-600 text-sm mt-2">Result:</div>
                                        <div className="text-lg font-semibold text-gray-800">{candidate.result}</div>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                    <div className="w-full lg:w-1/2 flex justify-center items-center flex-col">
                        <Card>
                            <CardHeader
                                floated={false}
                                shadow={false}
                                color="transparent"
                                className="flex flex-col gap-4 rounded-none md:flex-row md:items-center"
                            >
                            <div className='w-[100%]'>
                                <Typography variant="h6" color="blue-gray" className='flex justify-center items-center'>
                                    Pie Chart Visualisation
                                </Typography>
                            </div>
                            </CardHeader>
                            <CardBody className="mt-4 grid place-items-center px-2">
                                <Chart {...chartConfigPie} />
                            </CardBody>
                        </Card>

                        <Card>
                            <CardHeader
                                floated={false}
                                shadow={false}
                                color="transparent"
                                className="flex flex-col gap-4 rounded-none md:flex-row md:items-center"
                            >
                        
                                <div className='w-[100%]'>
                                    <Typography variant="h6" color="blue-gray" className='flex justify-center items-center'>
                                        Bar Chart Visualisation
                                    </Typography>
                                </div>
                            </CardHeader>
                            <CardBody className="px-2 pb-0">
                                <Chart {...chartConfigBar} />
                            </CardBody>
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    );
}
