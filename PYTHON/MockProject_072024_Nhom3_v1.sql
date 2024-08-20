USE [MockProject_072024_Nhom3]
GO
/****** Object:  Table [dbo].[Address]    Script Date: 8/9/2024 11:45:31 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Address](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[country] [varchar](255) NULL,
	[state] [varchar](255) NULL,
	[city] [varchar](255) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Bodyguard]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Bodyguard](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NULL,
	[company_id] [int] NULL,
	[job_id] [int] NULL,
	[service_id] [int] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[BodyguardTimesheets]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BodyguardTimesheets](
	[bodyguard_id] [int] NOT NULL,
	[timesheet_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[bodyguard_id] ASC,
	[timesheet_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Company]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Company](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](255) NULL,
	[address_id] [int] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Contract]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Contract](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[customer_id] [int] NULL,
	[company_id] [int] NULL,
	[address_id] [int] NULL,
	[status] [varchar](20) NULL,
	[start_date] [date] NULL,
	[end_date] [date] NULL,
	[price] [float] NULL,
	[rating] [varchar](20) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Customer]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Customer](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NULL,
	[avatar] [varchar](255) NULL,
	[bio] [varchar](255) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Feedback]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Feedback](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NULL,
	[content] [text] NULL,
	[createdAt] [datetime] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[FeedbackContract]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[FeedbackContract](
	[feedback_id] [int] NOT NULL,
	[contract_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[feedback_id] ASC,
	[contract_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Images]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Images](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[url] [varchar](255) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Job]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Job](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[skills] [varchar](255) NULL,
	[experience] [varchar](255) NULL,
	[certificate] [varchar](255) NULL,
	[health] [varchar](255) NULL,
	[license] [varchar](255) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[JobImages]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[JobImages](
	[job_id] [int] NOT NULL,
	[image_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[job_id] ASC,
	[image_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[News]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[News](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](255) NULL,
	[description] [text] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[NewsImages]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[NewsImages](
	[news_id] [int] NOT NULL,
	[image_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[news_id] ASC,
	[image_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Payment]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Payment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[contract_id] [int] NULL,
	[method] [varchar](20) NULL,
	[note] [varchar](255) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Recruitment]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Recruitment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[company_id] [int] NULL,
	[position] [varchar](255) NULL,
	[description] [text] NULL,
	[status] [varchar](20) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Report]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Report](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](255) NULL,
	[content] [text] NULL,
	[created_at] [datetime] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ReportTimesheets]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ReportTimesheets](
	[report_id] [int] NOT NULL,
	[timesheet_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[report_id] ASC,
	[timesheet_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Salary]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Salary](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[basic_salary] [float] NULL,
	[total_work] [int] NULL,
	[discipline] [float] NULL,
	[bonus] [float] NULL,
	[total_salary]  AS (([basic_salary]+[bonus])-[discipline]),
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Service]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Service](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[company_id] [int] NULL,
	[name] [varchar](255) NULL,
	[description] [text] NULL,
	[price] [float] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ServiceCompany]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ServiceCompany](
	[service_id] [int] NOT NULL,
	[company_id] [int] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[service_id] ASC,
	[company_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Timesheets]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Timesheets](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[salary_id] [int] NULL,
	[work_day] [date] NULL,
	[off_day] [date] NULL,
	[start_time] [datetime] NULL,
	[end_time] [datetime] NULL,
	[status] [varchar](20) NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[User]    Script Date: 8/9/2024 11:45:32 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[User](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[address_id] [int] NULL,
	[full_name] [varchar](255) NULL,
	[user_name] [varchar](255) NULL,
	[phone] [varchar](20) NULL,
	[email] [varchar](255) NULL,
	[password] [varchar](255) NULL,
	[gender] [varchar](10) NULL,
	[day_of_birth] [datetime] NULL,
	[role] [varchar](20) NULL,
	[company_id] [int] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON ) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Address] ON 

INSERT [dbo].[Address] ([id], [country], [state], [city], [deleted_at]) VALUES (1, N'USA', N'California', N'Los Angeles', NULL)
INSERT [dbo].[Address] ([id], [country], [state], [city], [deleted_at]) VALUES (2, N'Canada', N'Ontario', N'Toronto', NULL)
INSERT [dbo].[Address] ([id], [country], [state], [city], [deleted_at]) VALUES (3, N'UK', N'England', N'London', NULL)
SET IDENTITY_INSERT [dbo].[Address] OFF
GO
SET IDENTITY_INSERT [dbo].[Bodyguard] ON 

INSERT [dbo].[Bodyguard] ([id], [user_id], [company_id], [job_id], [service_id], [deleted_at]) VALUES (1, 3, 1, 1, 1, NULL)
INSERT [dbo].[Bodyguard] ([id], [user_id], [company_id], [job_id], [service_id], [deleted_at]) VALUES (2, 3, 2, 2, 2, NULL)
INSERT [dbo].[Bodyguard] ([id], [user_id], [company_id], [job_id], [service_id], [deleted_at]) VALUES (3, 3, 3, 3, 3, NULL)

SET IDENTITY_INSERT [dbo].[Bodyguard] OFF
GO
INSERT [dbo].[BodyguardTimesheets] ([bodyguard_id], [timesheet_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[BodyguardTimesheets] ([bodyguard_id], [timesheet_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[BodyguardTimesheets] ([bodyguard_id], [timesheet_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[Company] ON 

INSERT [dbo].[Company] ([id], [name], [address_id], [deleted_at]) VALUES (1, N'ABC Security', 1, NULL)
INSERT [dbo].[Company] ([id], [name], [address_id], [deleted_at]) VALUES (2, N'XYZ Protection', 2, NULL)
INSERT [dbo].[Company] ([id], [name], [address_id], [deleted_at]) VALUES (3, N'Secure Corp', 3, NULL)
SET IDENTITY_INSERT [dbo].[Company] OFF
GO
SET IDENTITY_INSERT [dbo].[Contract] ON 

INSERT [dbo].[Contract] ([id], [customer_id], [company_id], [address_id], [status], [start_date], [end_date], [price], [rating], [created_at], [updated_at], [deleted_at]) VALUES (1, 1, 1, 1, N'signed', CAST(N'2024-08-01' AS Date), CAST(N'2025-08-01' AS Date), 5000, N'excellent', CAST(N'2024-08-09T11:30:42.993' AS DateTime), CAST(N'2024-08-09T11:30:42.993' AS DateTime), NULL)
INSERT [dbo].[Contract] ([id], [customer_id], [company_id], [address_id], [status], [start_date], [end_date], [price], [rating], [created_at], [updated_at], [deleted_at]) VALUES (2, 2, 2, 2, N'unsigned', CAST(N'2024-08-15' AS Date), CAST(N'2025-08-15' AS Date), 3000, N'good', CAST(N'2024-08-09T11:30:42.993' AS DateTime), CAST(N'2024-08-09T11:30:42.993' AS DateTime), NULL)
INSERT [dbo].[Contract] ([id], [customer_id], [company_id], [address_id], [status], [start_date], [end_date], [price], [rating], [created_at], [updated_at], [deleted_at]) VALUES (3, 3, 3, 3, N'pending', CAST(N'2024-09-01' AS Date), CAST(N'2025-09-01' AS Date), 4000, N'fair', CAST(N'2024-08-09T11:30:42.993' AS DateTime), CAST(N'2024-08-09T11:30:42.993' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[Contract] OFF
GO
SET IDENTITY_INSERT [dbo].[Customer] ON 

INSERT [dbo].[Customer] ([id], [user_id], [avatar], [bio], [deleted_at]) VALUES (1, 2, N'avatar1.jpg', N'Loves outdoor activities', NULL)
INSERT [dbo].[Customer] ([id], [user_id], [avatar], [bio], [deleted_at]) VALUES (2, 3, N'avatar2.jpg', N'Fitness enthusiast', NULL)
INSERT [dbo].[Customer] ([id], [user_id], [avatar], [bio], [deleted_at]) VALUES (3, 1, N'avatar3.jpg', N'Tech geek', NULL)
SET IDENTITY_INSERT [dbo].[Customer] OFF
GO
SET IDENTITY_INSERT [dbo].[Feedback] ON 

INSERT [dbo].[Feedback] ([id], [user_id], [content], [createdAt], [deleted_at]) VALUES (1, 1, N'Great service, very satisfied!', CAST(N'2024-08-09T11:30:42.987' AS DateTime), NULL)
INSERT [dbo].[Feedback] ([id], [user_id], [content], [createdAt], [deleted_at]) VALUES (2, 2, N'Average experience, could be better.', CAST(N'2024-08-09T11:30:42.987' AS DateTime), NULL)
INSERT [dbo].[Feedback] ([id], [user_id], [content], [createdAt], [deleted_at]) VALUES (3, 3, N'Not happy with the service.', CAST(N'2024-08-09T11:30:42.987' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[Feedback] OFF
GO
INSERT [dbo].[FeedbackContract] ([feedback_id], [contract_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[FeedbackContract] ([feedback_id], [contract_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[FeedbackContract] ([feedback_id], [contract_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[Images] ON 

INSERT [dbo].[Images] ([id], [url], [deleted_at]) VALUES (1, N'image1.jpg', NULL)
INSERT [dbo].[Images] ([id], [url], [deleted_at]) VALUES (2, N'image2.jpg', NULL)
INSERT [dbo].[Images] ([id], [url], [deleted_at]) VALUES (3, N'image3.jpg', NULL)
SET IDENTITY_INSERT [dbo].[Images] OFF
GO
SET IDENTITY_INSERT [dbo].[Job] ON 

INSERT [dbo].[Job] ([id], [skills], [experience], [certificate], [health], [license], [deleted_at]) VALUES (1, N'Martial Arts, Defensive Driving', N'5 years', N'Certified Bodyguard', N'Excellent', N'Valid', NULL)
INSERT [dbo].[Job] ([id], [skills], [experience], [certificate], [health], [license], [deleted_at]) VALUES (2, N'Firearms Training, First Aid', N'3 years', N'Security License', N'Good', N'Valid', NULL)
INSERT [dbo].[Job] ([id], [skills], [experience], [certificate], [health], [license], [deleted_at]) VALUES (3, N'Crowd Control, Event Management', N'7 years', N'Event Security Certificate', N'Excellent', N'Valid', NULL)
SET IDENTITY_INSERT [dbo].[Job] OFF
GO
INSERT [dbo].[JobImages] ([job_id], [image_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[JobImages] ([job_id], [image_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[JobImages] ([job_id], [image_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[News] ON 

INSERT [dbo].[News] ([id], [title], [description], [deleted_at]) VALUES (1, N'Security Tips', N'Learn the best security tips for your home.', NULL)
INSERT [dbo].[News] ([id], [title], [description], [deleted_at]) VALUES (2, N'New Services', N'Introducing our latest security services.', NULL)
INSERT [dbo].[News] ([id], [title], [description], [deleted_at]) VALUES (3, N'Customer Reviews', N'Read what our customers are saying.', NULL)
SET IDENTITY_INSERT [dbo].[News] OFF
GO
INSERT [dbo].[NewsImages] ([news_id], [image_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[NewsImages] ([news_id], [image_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[NewsImages] ([news_id], [image_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[Payment] ON 

INSERT [dbo].[Payment] ([id], [contract_id], [method], [note], [deleted_at]) VALUES (1, 1, N'transfer', N'Payment received in full', NULL)
INSERT [dbo].[Payment] ([id], [contract_id], [method], [note], [deleted_at]) VALUES (2, 2, N'card', N'Paid via credit card', NULL)
INSERT [dbo].[Payment] ([id], [contract_id], [method], [note], [deleted_at]) VALUES (3, 3, N'installment', N'First installment received', NULL)
SET IDENTITY_INSERT [dbo].[Payment] OFF
GO
SET IDENTITY_INSERT [dbo].[Recruitment] ON 

INSERT [dbo].[Recruitment] ([id], [company_id], [position], [description], [status], [deleted_at]) VALUES (1, 1, N'Bodyguard', N'Seeking experienced bodyguards for VIP protection.', N'open', NULL)
INSERT [dbo].[Recruitment] ([id], [company_id], [position], [description], [status], [deleted_at]) VALUES (2, 2, N'Security Manager', N'Looking for a manager to oversee security operations.', N'open', NULL)
INSERT [dbo].[Recruitment] ([id], [company_id], [position], [description], [status], [deleted_at]) VALUES (3, 3, N'Event Security', N'Hiring security personnel for upcoming events.', N'close', NULL)
SET IDENTITY_INSERT [dbo].[Recruitment] OFF
GO
SET IDENTITY_INSERT [dbo].[Report] ON 

INSERT [dbo].[Report] ([id], [title], [content], [created_at], [deleted_at]) VALUES (1, N'Monthly Report', N'Summary of security operations for the month.', CAST(N'2024-08-09T11:30:42.990' AS DateTime), NULL)
INSERT [dbo].[Report] ([id], [title], [content], [created_at], [deleted_at]) VALUES (2, N'Incident Report', N'Details of the incident on 2024-08-01.', CAST(N'2024-08-09T11:30:42.990' AS DateTime), NULL)
INSERT [dbo].[Report] ([id], [title], [content], [created_at], [deleted_at]) VALUES (3, N'Performance Report', N'Evaluation of security personnel performance.', CAST(N'2024-08-09T11:30:42.990' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[Report] OFF
GO
INSERT [dbo].[ReportTimesheets] ([report_id], [timesheet_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[ReportTimesheets] ([report_id], [timesheet_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[ReportTimesheets] ([report_id], [timesheet_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[Salary] ON 

INSERT [dbo].[Salary] ([id], [basic_salary], [total_work], [discipline], [bonus], [deleted_at]) VALUES (1, 5000, 20, 100, 500, NULL)
INSERT [dbo].[Salary] ([id], [basic_salary], [total_work], [discipline], [bonus], [deleted_at]) VALUES (2, 4500, 18, 50, 300, NULL)
INSERT [dbo].[Salary] ([id], [basic_salary], [total_work], [discipline], [bonus], [deleted_at]) VALUES (3, 4000, 22, 0, 400, NULL)
SET IDENTITY_INSERT [dbo].[Salary] OFF
GO
SET IDENTITY_INSERT [dbo].[Service] ON 

INSERT [dbo].[Service] ([id], [company_id], [name], [description], [price], [deleted_at]) VALUES (1, 1, N'VIP Protection', N'High-level personal protection services', 5000, NULL)
INSERT [dbo].[Service] ([id], [company_id], [name], [description], [price], [deleted_at]) VALUES (2, 2, N'Event Security', N'Security services for events and gatherings', 3000, NULL)
INSERT [dbo].[Service] ([id], [company_id], [name], [description], [price], [deleted_at]) VALUES (3, 3, N'Residential Security', N'Protection services for residential areas', 2000, NULL)
SET IDENTITY_INSERT [dbo].[Service] OFF
GO
INSERT [dbo].[ServiceCompany] ([service_id], [company_id], [deleted_at]) VALUES (1, 1, NULL)
INSERT [dbo].[ServiceCompany] ([service_id], [company_id], [deleted_at]) VALUES (2, 2, NULL)
INSERT [dbo].[ServiceCompany] ([service_id], [company_id], [deleted_at]) VALUES (3, 3, NULL)
GO
SET IDENTITY_INSERT [dbo].[Timesheets] ON 

INSERT [dbo].[Timesheets] ([id], [salary_id], [work_day], [off_day], [start_time], [end_time], [status], [deleted_at]) VALUES (1, 1, CAST(N'2024-08-01' AS Date), CAST(N'2024-08-02' AS Date), CAST(N'2024-08-01T08:00:00.000' AS DateTime), CAST(N'2024-08-01T17:00:00.000' AS DateTime), N'approve', NULL)
INSERT [dbo].[Timesheets] ([id], [salary_id], [work_day], [off_day], [start_time], [end_time], [status], [deleted_at]) VALUES (2, 2, CAST(N'2024-08-03' AS Date), CAST(N'2024-08-04' AS Date), CAST(N'2024-08-03T09:00:00.000' AS DateTime), CAST(N'2024-08-03T18:00:00.000' AS DateTime), N'is_pending', NULL)
INSERT [dbo].[Timesheets] ([id], [salary_id], [work_day], [off_day], [start_time], [end_time], [status], [deleted_at]) VALUES (3, 3, CAST(N'2024-08-05' AS Date), CAST(N'2024-08-06' AS Date), CAST(N'2024-08-05T07:00:00.000' AS DateTime), CAST(N'2024-08-05T16:00:00.000' AS DateTime), N'approve', NULL)
SET IDENTITY_INSERT [dbo].[Timesheets] OFF
GO
SET IDENTITY_INSERT [dbo].[User] ON 

INSERT [dbo].[User] ([id], [address_id], [full_name], [user_name], [phone], [email], [password], [gender], [day_of_birth], [role], [company_id], [deleted_at]) VALUES (1, 1, N'John Doe', N'johndoe', N'1234567890', N'john@example.com', N'password123', N'male', CAST(N'1990-01-01T00:00:00.000' AS DateTime), N'admin', 1, NULL)
INSERT [dbo].[User] ([id], [address_id], [full_name], [user_name], [phone], [email], [password], [gender], [day_of_birth], [role], [company_id], [deleted_at]) VALUES (2, 2, N'Jane Smith', N'janesmith', N'0987654321', N'jane@example.com', N'password123', N'female', CAST(N'1992-02-02T00:00:00.000' AS DateTime), N'customer', 2, NULL)
INSERT [dbo].[User] ([id], [address_id], [full_name], [user_name], [phone], [email], [password], [gender], [day_of_birth], [role], [company_id], [deleted_at]) VALUES (3, 3, N'Alice Johnson', N'alicej', N'5555555555', N'alice@example.com', N'password123', N'female', CAST(N'1994-03-03T00:00:00.000' AS DateTime), N'bodyguard', 3, NULL)
SET IDENTITY_INSERT [dbo].[User] OFF
GO
ALTER TABLE [dbo].[Contract] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[Contract] ADD  DEFAULT (getdate()) FOR [updated_at]
GO
ALTER TABLE [dbo].[Feedback] ADD  DEFAULT (getdate()) FOR [createdAt]
GO
ALTER TABLE [dbo].[Report] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[Bodyguard]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[Bodyguard]  WITH CHECK ADD FOREIGN KEY([job_id])
REFERENCES [dbo].[Job] ([id])
GO
ALTER TABLE [dbo].[Bodyguard]  WITH CHECK ADD FOREIGN KEY([service_id])
REFERENCES [dbo].[Service] ([id])
GO
ALTER TABLE [dbo].[Bodyguard]  WITH CHECK ADD FOREIGN KEY([user_id])
REFERENCES [dbo].[User] ([id])
GO
ALTER TABLE [dbo].[BodyguardTimesheets]  WITH CHECK ADD FOREIGN KEY([bodyguard_id])
REFERENCES [dbo].[Bodyguard] ([id])
GO
ALTER TABLE [dbo].[BodyguardTimesheets]  WITH CHECK ADD FOREIGN KEY([timesheet_id])
REFERENCES [dbo].[Timesheets] ([id])
GO
ALTER TABLE [dbo].[Company]  WITH CHECK ADD FOREIGN KEY([address_id])
REFERENCES [dbo].[Address] ([id])
GO
ALTER TABLE [dbo].[Contract]  WITH CHECK ADD FOREIGN KEY([address_id])
REFERENCES [dbo].[Address] ([id])
GO
ALTER TABLE [dbo].[Contract]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[Contract]  WITH CHECK ADD FOREIGN KEY([customer_id])
REFERENCES [dbo].[Customer] ([id])
GO
ALTER TABLE [dbo].[Customer]  WITH CHECK ADD FOREIGN KEY([user_id])
REFERENCES [dbo].[User] ([id])
GO
ALTER TABLE [dbo].[Feedback]  WITH CHECK ADD FOREIGN KEY([user_id])
REFERENCES [dbo].[User] ([id])
GO
ALTER TABLE [dbo].[FeedbackContract]  WITH CHECK ADD FOREIGN KEY([contract_id])
REFERENCES [dbo].[Contract] ([id])
GO
ALTER TABLE [dbo].[FeedbackContract]  WITH CHECK ADD FOREIGN KEY([feedback_id])
REFERENCES [dbo].[Feedback] ([id])
GO
ALTER TABLE [dbo].[JobImages]  WITH CHECK ADD FOREIGN KEY([image_id])
REFERENCES [dbo].[Images] ([id])
GO
ALTER TABLE [dbo].[JobImages]  WITH CHECK ADD FOREIGN KEY([job_id])
REFERENCES [dbo].[Job] ([id])
GO
ALTER TABLE [dbo].[NewsImages]  WITH CHECK ADD FOREIGN KEY([image_id])
REFERENCES [dbo].[Images] ([id])
GO
ALTER TABLE [dbo].[NewsImages]  WITH CHECK ADD FOREIGN KEY([news_id])
REFERENCES [dbo].[News] ([id])
GO
ALTER TABLE [dbo].[Payment]  WITH CHECK ADD FOREIGN KEY([contract_id])
REFERENCES [dbo].[Contract] ([id])
GO
ALTER TABLE [dbo].[Recruitment]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[ReportTimesheets]  WITH CHECK ADD FOREIGN KEY([report_id])
REFERENCES [dbo].[Report] ([id])
GO
ALTER TABLE [dbo].[ReportTimesheets]  WITH CHECK ADD FOREIGN KEY([timesheet_id])
REFERENCES [dbo].[Timesheets] ([id])
GO
ALTER TABLE [dbo].[Service]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[ServiceCompany]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[ServiceCompany]  WITH CHECK ADD FOREIGN KEY([service_id])
REFERENCES [dbo].[Service] ([id])
GO
ALTER TABLE [dbo].[Timesheets]  WITH CHECK ADD FOREIGN KEY([salary_id])
REFERENCES [dbo].[Salary] ([id])
GO
ALTER TABLE [dbo].[User]  WITH CHECK ADD FOREIGN KEY([address_id])
REFERENCES [dbo].[Address] ([id])
GO
ALTER TABLE [dbo].[User]  WITH CHECK ADD FOREIGN KEY([company_id])
REFERENCES [dbo].[Company] ([id])
GO
ALTER TABLE [dbo].[Contract]  WITH CHECK ADD CHECK  (([status]='signed' OR [status]='unsigned' OR [status]='pending'))
GO
ALTER TABLE [dbo].[Payment]  WITH CHECK ADD CHECK  (([method]='installment' OR [method]='card' OR [method]='transfer'))
GO
ALTER TABLE [dbo].[Recruitment]  WITH CHECK ADD CHECK  (([status]='close' OR [status]='open'))
GO
ALTER TABLE [dbo].[Timesheets]  WITH CHECK ADD CHECK  (([status]='approve' OR [status]='is_pending'))
GO
ALTER TABLE [dbo].[User]  WITH CHECK ADD CHECK  (([gender]='female' OR [gender]='male'))
GO
ALTER TABLE [dbo].[User]  WITH CHECK ADD CHECK  (([role]='staff' OR [role]='bodyguard' OR [role]='customer' OR [role]='admin'))
GO
